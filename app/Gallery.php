<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['name', 'place_id', 'is_main', 'is_room'];

    // Получить картинки галереи.
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    // Получить место размещения, владеющее галереей.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    // Получить номера галереи.
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
