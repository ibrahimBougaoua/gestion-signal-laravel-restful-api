<?php

namespace App\Observers;

use App\Signaler;

class SignalerObserver
{
    /**
     * Handle the signaler "created" event.
     *
     * @param  \App\Signaler  $signaler
     * @return void
     */
    public function created(Signaler $signaler)
    {
        //
    }

    /**
     * Handle the signaler "updated" event.
     *
     * @param  \App\Signaler  $signaler
     * @return void
     */
    public function updated(Signaler $signaler)
    {
        //
    }

    /**
     * Handle the signaler "deleted" event.
     *
     * @param  \App\Signaler  $signaler
     * @return void
     */
    public function deleted(Signaler $signaler)
    {
        //
    }

    /**
     * Handle the signaler "restored" event.
     *
     * @param  \App\Signaler  $signaler
     * @return void
     */
    public function restored(Signaler $signaler)
    {
        //
    }

    /**
     * Handle the signaler "force deleted" event.
     *
     * @param  \App\Signaler  $signaler
     * @return void
     */
    public function forceDeleted(Signaler $signaler)
    {
        //
    }
}
