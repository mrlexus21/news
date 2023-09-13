<?php

namespace App\Observers;

use App\Models\Ad;
use Illuminate\Support\Facades\Storage;

class AdObserver
{
    /**
     * Handle the Ad "created" event.
     */
    public function created(Ad $ad): void
    {
        //
    }

    /**
     * Handle the Ad "updated" event.
     */
    public function updated(Ad $ad): void
    {
        $oldImageSource = $ad->getOriginal('image');

        if ($oldImageSource !== $ad->image) {
            $this->deleteFileFromSource($oldImageSource);
        }
    }

    /**
     * Handle the Ad "deleted" event.
     */
    public function deleted(Ad $ad): void
    {
        //
    }

    /**
     * Handle the Ad "restored" event.
     */
    public function restored(Ad $ad): void
    {
        //
    }

    /**
     * Handle the Ad "force deleted" event.
     */
    public function forceDeleted(Ad $ad): void
    {
        //
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
}
