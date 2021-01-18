<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $fillable = [
        'signalisation_id','price','etat_avancement','date_debut','date_fin'
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

    public function getEvaluer()
    {
        return $this->hasMany('App\Evaluer','intervention_id','id');
    }

    public function getSignalisation()
    {
        return $this->belongsTo('App\Signalisation','id','signalisation_id');
    }
}
