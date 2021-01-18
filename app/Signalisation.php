<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signalisation extends Model
{
    protected $fillable = [
        'desc','localisation','lieu','nature','cause','trash','edit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function getInterventions()
    {
        return $this->hasMany('App\Intervention','signalisation_id','id');
    }

    public function getSignales()
    {
        return $this->hasMany('App\Signaler','signalisation_id','id');
    }



}
