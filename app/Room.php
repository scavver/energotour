<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'hotel_id',
        'gallery_id',
        'number_of_rooms',
        'category',
        'view',
        'number_of_places',
        'number_of_extra_hotels',
        'area',
        'furniture',
        'equipment',
        'bathroom',
        'service'
    ];

    /**
     * Get the hotel that owns the room.
     */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    /**
     * Get the gallery that owns the room.
     */
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }

    /**
     * Get the orders for the room.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
