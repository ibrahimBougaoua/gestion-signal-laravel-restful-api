<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'd_f_equipe','mail','telephone'
    ];
}
