<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['imageable_id', 'imageable_type', 'alt', 'path_compressed', 'path_sm', 'priority', 'gallery_id'];

    // Получить все модели, обладающие imageable
    public function imageable()
    {
        return $this->morphTo();
    }

    // Получить галерею, владеющую картинкой.
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }

    // Получить достопримечательность изображения
    public function landmark()
    {
        return $this->hasOne('App\Landmark', 'cover_id');
    }
}
