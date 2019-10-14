<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['min_price', 'place_id'];

    // Получить изображение прайса
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    // Получить документ прайса
    public function document()
    {
        return $this->morphOne('App\Document', 'documentable');
    }

    // Получить место размещения, владеющее прайсом.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

}
