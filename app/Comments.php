<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reply_id','user_id','signalisation_id','name','mail','comment'
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

    public function getSignalisation()
    {
        return $this->belongsTo('App\Signalisation','id','signalisation_id');
    }

    public function getComments()
    {
        return $this->hasMany('App\Comments','id','reply_id');
    }

}
