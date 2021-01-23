<?php

namespace App\Observers;

use App\Signalisation;

class SignalisationObserver
{
    /**
     * Handle the signalisation "created" event.
     *
     * @param  \App\Signalisation  $signalisation
     * @return void
     */
    public function created(Signalisation $signalisation)
    {
        //
    }

    /**
     * Handle the signalisation "updated" event.
     *
     * @param  \App\Signalisation  $signalisation
     * @return void
     */
    public function updated(Signalisation $signalisation)
    {
        //
    }

    /**
     * Handle the signalisation "deleted" event.
     *
     * @param  \App\Signalisation  $signalisation
     * @return void
     */
    public function deleted(Signalisation $signalisation)
    {
        //
    }

    /**
     * Handle the signalisation "restored" event.
     *
     * @param  \App\Signalisation  $signalisation
     * @return void
     */
    public function restored(Signalisation $signalisation)
    {
        //
    }

    /**
     * Handle the signalisation "force deleted" event.
     *
     * @param  \App\Signalisation  $signalisation
     * @return void
     */
    public function forceDeleted(Signalisation $signalisation)
    {
        //
    }
}
