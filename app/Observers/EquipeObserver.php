<?php

namespace App\Observers;

use App\Equipe;

class EquipeObserver
{
    /**
     * Handle the equipe "created" event.
     *
     * @param  \App\Equipe  $equipe
     * @return void
     */
    public function created(Equipe $equipe)
    {
        //
    }

    /**
     * Handle the equipe "updated" event.
     *
     * @param  \App\Equipe  $equipe
     * @return void
     */
    public function updated(Equipe $equipe)
    {
        //
    }

    /**
     * Handle the equipe "deleted" event.
     *
     * @param  \App\Equipe  $equipe
     * @return void
     */
    public function deleted(Equipe $equipe)
    {
        //
    }

    /**
     * Handle the equipe "restored" event.
     *
     * @param  \App\Equipe  $equipe
     * @return void
     */
    public function restored(Equipe $equipe)
    {
        //
    }

    /**
     * Handle the equipe "force deleted" event.
     *
     * @param  \App\Equipe  $equipe
     * @return void
     */
    public function forceDeleted(Equipe $equipe)
    {
        //
    }
}
