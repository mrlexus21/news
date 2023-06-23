<?php

namespace App\Observers;

use App\Models\Category;
use App\Repositories\CategoryCachedRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function creating(Category $category): void
    {
        $this->setSlug($category);
    }

    public function setSlug(Category $category): void
    {
        if (!isset($category->slug)) {
            $category->slug = Str::slug($category->name);
        }
    }

    public function created(Category $category): void
    {
        $this->forgetOldDataPostRepository();
    }

    public function updated(Category $category): void
    {
        $this->forgetOldDataPostRepository();
    }

    public function deleted(Category $category): void
    {
        $this->forgetOldDataPostRepository();
    }

    public function forceDeleted(Category $category): void
    {
        $this->forgetOldDataPostRepository();
    }

    private function forgetOldDataPostRepository(): void
    {
        $repositoryMethods = array_map(function ($value) {
            return CategoryCachedRepository::class . $value;
        },
            get_class_methods(CategoryCachedRepository::class));

        Cache::tags($repositoryMethods)->flush();
    }
}
