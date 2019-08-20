<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['title', 'class'];

    protected $hidden = ['pivot'];

    // Определяет необходимость отметок времени для модели.
    public $timestamps = false;

    // Места, принадлежащие характеристике.
    public function places()
    {
        return $this->belongsToMany('App\Place', 'place_property', 'property_id', 'place_id');
    }
}
