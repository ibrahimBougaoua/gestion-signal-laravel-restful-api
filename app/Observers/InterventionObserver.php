<?php

namespace App\Observers;

use App\Intervention;
use App\Signalisation;

class InterventionObserver
{
    /**
     * Handle the intervention "created" event.
     *
     * @param  \App\Intervention  $intervention
     * @return void
     */
    public function created(Intervention $intervention)
    {
        $signalisation = Signalisation::find($intervention->signalisation_id);
        $signalisation->update([
            'intervention' => 1
        ]);
    }

    /**
     * Handle the intervention "updated" event.
     *
     * @param  \App\Intervention  $intervention
     * @return void
     */
    public function updated(Intervention $intervention)
    {
        $signalisation = Signalisation::find($intervention->signalisation_id);
        $signalisation->update([
            'etat' => $intervention->etat_avancement == "final" ? 1 : 0
        ]);
    }

    /**
     * Handle the intervention "deleted" event.
     *
     * @param  \App\Intervention  $intervention
     * @return void
     */
    public function deleted(Intervention $intervention)
    {
        $signalisation = Signalisation::find($intervention->signalisation_id);
        $signalisation->update([
            'intervention' => 0
        ]);
    }

    /**
     * Handle the intervention "restored" event.
     *
     * @param  \App\Intervention  $intervention
     * @return void
     */
    public function restored(Intervention $intervention)
    {
        //
    }

    /**
     * Handle the intervention "force deleted" event.
     *
     * @param  \App\Intervention  $intervention
     * @return void
     */
    public function forceDeleted(Intervention $intervention)
    {
        //
    }
}
