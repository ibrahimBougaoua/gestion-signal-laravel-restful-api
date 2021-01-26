<?php

namespace App;

use App\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use Multitenancy;

    protected $fillable = [
        'message','user_id','catch_user_id'
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

    public function getSender()
    {
        return $this->belongsTo('App\User','id','send_user_id');
    }

    public function getCatcher()
    {
        return $this->belongsTo('App\User','id','catch_user_id');
    }
}
