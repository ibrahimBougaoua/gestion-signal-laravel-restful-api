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

    public function getChefTeam()
    {
        return $this->belongsTo('App\User','id','chef_id');
    }

    public function getManager()
    {
        return $this->belongsTo('App\User','id','gest_id');
    }

}
