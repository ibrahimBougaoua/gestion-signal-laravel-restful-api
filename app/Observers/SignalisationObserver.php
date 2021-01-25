<?php

namespace App\Observers;

use App\Signalisation;
use App\Signaler;
use Illuminate\Support\Facades\Auth;

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
        Signaler::create([
            'signalisation_id' => $signalisation->id
        ]);
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
        $signaler = Signaler::where('signalisation_id',$signalisation->id);
        $signaler->delete();
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
