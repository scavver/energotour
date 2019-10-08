<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['enabled', 'name', 'title', 'description', 'type_id', 'region_id', 'slug', 'lat', 'lng'];

    // Характеристики, принадлежащие месту.
    public function properties()
    {
        return $this->belongsToMany('App\Property', 'place_property', 'place_id', 'property_id');
    }

    // Получить тип, владеющий местом.
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    // Получить регион, владеющий местом.
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    // Получить изображение достопримечательности
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    // Получить прайс места.
    public function price()
    {
        return $this->hasOne('App\Price');
    }

    // Получить скидки места.
    public function discount()
    {
        return $this->hasOne('App\Discount');
    }

    // Получить галереи места.
    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }

    // Получить номера объекта размещения.
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    // Получить запись с информацией об отеле.
    public function about()
    {
        return $this->hasOne('App\About');
    }

    // Получить запись с информацией о питании в отеле.
    public function food()
    {
        return $this->hasOne('App\Food');
    }

    // Получить запись с информацией об инфраструктуре отеля.
    public function infrastructure()
    {
        return $this->hasOne('App\Infrastructure');
    }

    // Получить запись с информацией о лечении в отеле.
    public function treatment()
    {
        return $this->hasOne('App\Treatment');
    }
}
