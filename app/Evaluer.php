<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','intervention_id'
    ];
}
