<?php

namespace App\Traits;

trait Multitenancy {

    public static function bootMultitenancy()
    {
        static::creating(function($model){
            $model->user_id = 1;
        });
        static::addGlobalScope('user_id',function ($builder){
            return $builder->where('user_id',1);
        });
    }
}
