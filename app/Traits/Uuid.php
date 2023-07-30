<?php
 
namespace App\Traits;

use Uuid as Uuids;
 
trait Uuid {
 
    

    public static function boot()
    {

        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuids::generate(4);
        });
    }
}
 