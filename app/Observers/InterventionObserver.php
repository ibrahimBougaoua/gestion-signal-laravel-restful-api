<?php

namespace App\Observers;

use App\Intervention;

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
        //
    }

    /**
     * Handle the intervention "updated" event.
     *
     * @param  \App\Intervention  $intervention
     * @return void
     */
    public function updated(Intervention $intervention)
    {
        //
    }

    /**
     * Handle the intervention "deleted" event.
     *
     * @param  \App\Intervention  $intervention
     * @return void
     */
    public function deleted(Intervention $intervention)
    {
        //
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
