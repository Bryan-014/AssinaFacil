<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getUuidColumn()})) {
                $model->{$model->getUuidColumn()} = (string) Str::uuid();
            }
        });
    }

    public function getUuidColumn()
    {
        return defined(get_class($this) . '::UUID') ? constant(get_class($this) . '::UUID') : 'uuid';
    }

    public function getRouteKeyName()
    {
        return $this->getUuidColumn();
    }
}