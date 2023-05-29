<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    public function before(User $user, $ability)
    {
        if ($user->hasAnyRole(['admin'])) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasAnyRole(['admin', 'Chief-editor', 'Editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Category $category): bool
    {
        if ($user->hasAnyRole(['admin', 'Chief-editor', 'Editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasAnyRole(['admin', 'Chief-editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Category $category): bool
    {
        if ($user->hasAnyRole(['admin', 'Chief-editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Category $category): bool
    {
        if ($user->hasAnyRole(['admin', 'Chief-editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Category $category): bool
    {
        if ($user->hasAnyRole(['admin', 'Chief-editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Category $category): bool
    {
        if ($user->hasAnyRole(['admin', 'Chief-editor'])) {
            return true;
        }

        return false;
    }
}
