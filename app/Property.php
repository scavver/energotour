<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'class'];

    protected $hidden = ['pivot'];

    // Определяет необходимость отметок времени для модели.
    public $timestamps = false;

    // Места, принадлежащие характеристике.
    public function hotels()
    {
        return $this->belongsToMany('App\Hotel', 'hotel_property', 'property_id', 'hotel_id');
    }
}
