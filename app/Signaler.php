<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signaler extends Model
{
    protected $fillable = [
        'user_id','signalisation_id'
    ];
}
