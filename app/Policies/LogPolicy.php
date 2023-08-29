<?php

namespace App\Policies;

use App\Models\Log;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LogPolicy
{
    /**
     * @param User $user
     * @param $ability
     * @return bool|void
     */
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
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Log $log): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Log $log): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Log $log): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Log $log): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Log $log): bool
    {
        return false;
    }
}
