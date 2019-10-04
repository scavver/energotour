<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['region_id', 'user_id', 'title', 'description', 'content', 'slug'];

    // Получить регион достопримечательности
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    // Получить автора достопримечательности
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Получить изображение достопримечательности
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
