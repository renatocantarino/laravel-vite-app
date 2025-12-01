<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateGuid
{
    public static function bootGenerateGuid()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}