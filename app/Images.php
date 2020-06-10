<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','size','user_id','signalisation_id'
    ];
}
