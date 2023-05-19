<?php

namespace App\Observers;

use App\Models\Category;
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
}
