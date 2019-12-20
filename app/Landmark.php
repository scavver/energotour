<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * Get the landmark's gallery.
     */
    public function gallery()
    {
        return $this->morphOne('App\Gallery', 'galleriable', 'type', 'type_id');
    }
}
