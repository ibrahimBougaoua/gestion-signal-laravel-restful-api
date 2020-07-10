<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $fillable = [
        'signalisation_id','price','etat_avancement','date_debut','date_fin'
    ];
}
