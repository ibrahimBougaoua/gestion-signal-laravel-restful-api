<?php

namespace App\Observers;

use App\Images;

class ImagesObserver
{
    /**
     * Handle the images "created" event.
     *
     * @param  \App\Images  $images
     * @return void
     */
    public function created(Images $images)
    {
        //
    }

    /**
     * Handle the images "updated" event.
     *
     * @param  \App\Images  $images
     * @return void
     */
    public function updated(Images $images)
    {
        //
    }

    /**
     * Handle the images "deleted" event.
     *
     * @param  \App\Images  $images
     * @return void
     */
    public function deleted(Images $images)
    {
        //
    }

    /**
     * Handle the images "restored" event.
     *
     * @param  \App\Images  $images
     * @return void
     */
    public function restored(Images $images)
    {
        //
    }

    /**
     * Handle the images "force deleted" event.
     *
     * @param  \App\Images  $images
     * @return void
     */
    public function forceDeleted(Images $images)
    {
        //
    }
}
