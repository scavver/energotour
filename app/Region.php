<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    // Определяет необходимость отметок времени для модели.
    public $timestamps = false;

    // Получить места размещения категории.
    public function hotels()
    {
        return $this->hasMany('App\Hotel');
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
