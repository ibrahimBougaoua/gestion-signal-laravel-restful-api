<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gest_id','chef_id','signalisation_id'
    ];
}
