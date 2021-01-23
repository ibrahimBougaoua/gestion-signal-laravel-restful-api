<?php

namespace App;

use App\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use Multitenancy;

    protected $fillable = [
        'user_id','equipe_id'
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

    public function getMembre()
    {
        return $this->belongsTo('App\User','id','user_id');
    }

    public function getTeam()
    {
        return $this->belongsTo('App\Equipe','id','equipe_id');
    }
}
