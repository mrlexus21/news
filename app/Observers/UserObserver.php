<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $oldImageSource = $user->getOriginal('image');

        if ($oldImageSource !== $user->image) {
            $this->deleteFileFromSource($oldImageSource);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }

    /**
     * Delete file from source
     *
     * @param string $source
     * @return void
     */
    private function deleteFileFromSource(string $source):void
    {
        if(Storage::exists($source)){
            Storage::delete($source);
        }
    }
}
