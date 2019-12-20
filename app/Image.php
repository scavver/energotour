<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
}
