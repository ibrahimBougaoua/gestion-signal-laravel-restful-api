<?php

namespace App\Traits;

trait Multitenancy {

    public static function bootMultitenancy()
    {
        static::creating(function($model){
            $model->id = 12;
        });
        static::addGlobalScope('id',function ($builder){
            return $builder->where('id',12);
        });
    }
}
