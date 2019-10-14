<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['documentable_id', 'documentable_type', 'path'];

    // Получить все модели, обладающие documentable
    public function documentable()
    {
        return $this->morphTo();
    }
}
