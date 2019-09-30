<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['alt', 'path_compressed', 'path_sm', 'priority', 'gallery_id'];

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
