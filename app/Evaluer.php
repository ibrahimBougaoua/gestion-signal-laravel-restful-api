<?php

namespace App;

use App\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Model;

class Evaluer extends Model
{
    use Multitenancy;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','intervention_id'
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

    public function getAuthor()
    {
        return $this->belongsTo('App\User','id','user_id');
    }

    public function getIntervention()
    {
        return $this->belongsTo('App\Intervention','id','intervention_id');
    }
}
