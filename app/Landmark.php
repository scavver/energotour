<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['category_id', 'user_id', 'cover_id', 'title', 'description', 'content', 'slug'];

    // Получить автора достопримечательности
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Получить категорию достопримечательности
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Получить обложку достопримечательности
    public function cover()
    {
        return $this->belongsTo('App\Image', 'id');
    }
}
