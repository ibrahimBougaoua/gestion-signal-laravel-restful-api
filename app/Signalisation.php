<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signalisation extends Model
{
    protected $fillable = [
        'desc','localisation','photo','lieu','nature','cause','trash','edit'
    ];
}
