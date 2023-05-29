<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function before(User $user, $ability)
    {
        if ($user->hasAnyRole(['Admin'])) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasAnyRole(['Admin', 'Chief-editor', 'Editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        if ($user->hasAnyRole(['Admin', 'Chief-editor'])) {
            return true;
        }

        return ($post->user_id == $user->id) || ($post->is_published === true);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Chief-editor', 'Editor']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        if ($user->hasAnyRole(['Admin', 'Chief-editor'])) {
            return true;
        }

        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        if ($user->hasAnyRole(['Admin', 'Chief-editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        if ($user->hasAnyRole(['Admin', 'Chief-editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        if ($user->hasAnyRole(['Admin', 'Chief-editor'])) {
            return true;
        }

        return false;
    }
}
