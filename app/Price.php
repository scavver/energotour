<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['min_price', 'hotel_id'];

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
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

}
