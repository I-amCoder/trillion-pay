<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Multitenantable {

    protected static function bootMultitenantable()
    {
        if (auth()->check() || auth()->guard('admin')->check()) {
            static::creating(function ($model) {
                $model->user_id = auth()->id();
            });
        }

        if(!auth()->guard('admin')->check()){
            static::addGlobalScope('user_id', function (Builder $builder) {
                $builder->where('user_id', auth()->id());
            });

        }
    }

}
