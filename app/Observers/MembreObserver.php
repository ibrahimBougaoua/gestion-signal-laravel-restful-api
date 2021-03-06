<?php

namespace App\Observers;

use App\Equipe;
use App\Membre;

class MembreObserver
{
    /**
     * Handle the membre "created" event.
     *
     * @param  \App\Membre  $membre
     * @return void
     */
    public function created(Membre $membre)
    {
        $team = Equipe::find($membre->equipe_id);
        $team->update([
            'nbr_membres' => $team->nbr_membres + 1
        ]);
    }

    /**
     * Handle the membre "updated" event.
     *
     * @param  \App\Membre  $membre
     * @return void
     */
    public function updated(Membre $membre)
    {
        //
    }

    /**
     * Handle the membre "deleted" event.
     *
     * @param  \App\Membre  $membre
     * @return void
     */
    public function deleted(Membre $membre)
    {
        $team = Equipe::find($membre->equipe_id);
        $team->update([
            'nbr_membres' => $team->nbr_membres - 1
        ]);
    }

    /**
     * Handle the membre "restored" event.
     *
     * @param  \App\Membre  $membre
     * @return void
     */
    public function restored(Membre $membre)
    {
        //
    }

    /**
     * Handle the membre "force deleted" event.
     *
     * @param  \App\Membre  $membre
     * @return void
     */
    public function forceDeleted(Membre $membre)
    {
        //
    }
}
