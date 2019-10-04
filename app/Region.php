<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['name'];

    // Определяет необходимость отметок времени для модели.
    public $timestamps = false;

    // Получить места размещения категории.
    public function places()
    {
        return $this->hasMany('App\Place');
    }

    // Получить достопримечательности
    public function landmarks()
    {
        return $this->hasMany('App\Landmark');
    }

    // Получить изображение региона
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

}
