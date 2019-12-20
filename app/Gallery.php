<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'hotel_id', 'is_main', 'is_room'];

    /**
     * Get the owning galleriable model.
     */
    public function galleriable()
    {
        return $this->morphTo();
    }

    // Получить картинки галереи.
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    // Получить место размещения, владеющее галереей.
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    // Получить номера галереи.
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
