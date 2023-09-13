<?php

namespace App\Observers;

use App\Events\PostPublicatedEvent;
use App\Models\Post;
use App\Repositories\PostCachedRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post): void
    {
        $this->setSlug($post);
        $this->setAuthor($post);

        if ($post->is_published === true) {
            $this->setPublishedNow($post);
        }
    }

    public function created(Post $post)
    {
        $this->forgetOldDataPostRepository($post);

        if (($post->is_published === true) && ($post->published_at !== null)) {
            Event::dispatch(new PostPublicatedEvent($post));
        }
    }

    private function setSlug(Post $post): void
    {
        if (!isset($post->slug)) {
            $post->slug = Str::slug($post->title);
        }
    }

    private function setAuthor(Post $post): void
    {
        if (Auth::check()) {
            $post->user_id = Auth::user()->id;
        }
    }

    public function updating(Post $post)
    {
        if ($post->isDirty('is_published')
            && ($post->is_published === true)
            && ($post->getOriginal('is_published') !== true)
            && ($post->published_at == null)) {
            $this->setPublishedNow($post);
        }
    }

    public function updated(Post $post): void
    {
        $oldImageSource = $post->getOriginal('image');

        if ($oldImageSource !== $post->image) {
            $this->deleteFileFromSource($oldImageSource);
        }

        if ($post->isDirty('is_published')
            && ($post->is_published === true)
            && ($post->getOriginal('is_published') !== true)
            && ($post->published_at !== null)) {

            Event::dispatch(new PostPublicatedEvent($post));
        }

        $this->forgetOldDataPostRepository($post);
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function forceDeleted(Post $post): void
    {
        $this->deleteImageFromEntity($post);
        $this->forgetOldDataPostRepository($post);
    }

    public function deleted(Post $post)
    {
        $this->forgetOldDataPostRepository($post);
    }

    /**
     * Delete image from entity
     * @param Post $post
     */
    private function deleteImageFromEntity(Post $post): void
    {
        if (isset($post->image)) {
            dump(config('filesystems.local_paths.news_images') . $post->image);
            Storage::delete(config('filesystems.local_paths.news_images') . $post->image);
        }
    }

    private function forgetOldDataPostRepository(Post $post): void
    {
        if ($post->isPublished()) {
            $repositoryMethods = array_map(function ($value) {
                return PostCachedRepository::class . $value;
            },
                get_class_methods(PostCachedRepository::class));

            $repositoryMethods[] = 'lastPostsMonth';

            Cache::tags($repositoryMethods)->flush();
        }
    }

    /**
     * Delete file from source
     *
     * @param string $source
     * @return void
     */
    private function deleteFileFromSource(string $source): void
    {
        $filePath = config('filesystems.local_paths.news_images') . $source;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }

    private function setPublishedNow(Post $post)
    {
        $post->published_at = Carbon::now()->toDateTimeString();
    }
}
