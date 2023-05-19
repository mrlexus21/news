<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post): void
    {
        $this->setSlug($post);
        $this->setAuthor($post);
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

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        $oldImageSource = $post->getOriginal('image');

        if ($oldImageSource !== $post->image) {
            $this->deleteFileFromSource($oldImageSource);
        }
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        $this->deleteImageFromEntity($post);
    }

    /**
     * Delete image from entity
     * @param Post $post
     */
    private function deleteImageFromEntity(Post $post): void
    {
        if (isset($post->image)) {
            Storage::delete($post->image);
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
        if (Storage::exists($source)) {
            Storage::delete($source);
        }
    }
}
