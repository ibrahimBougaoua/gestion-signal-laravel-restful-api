<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    protected $fillable = [
        'user_id','equipe_id'
    ];
}
