<?php

namespace App;

use App\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use Multitenancy;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'd_f_equipe','mail','telephone','chef_equipe','user_id','nbr_membres'
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

    public function getMembres()
    {
        return $this->hasMany('App\Membre','equipe_id','id');
    }

    public function getChefTeam()
    {
        return $this->belongsTo('App\User','id','chef_equipe');
    }

}
