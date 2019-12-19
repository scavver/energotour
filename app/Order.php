<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'arrival',
        'departure',
        'hotel_id',
        'room_id',
        'payer_id',
        'user_id',
        'comment',
        'status',
        ];

    /**
     * Get the tourists for the order.
     */
    public function tourists()
    {
        return $this->belongsToMany('App\Tourist', 'order_tourist', 'order_id', 'tourist_id');
    }

    /**
     * Get the hotel that owns the order.
     */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    /**
     * Get the room that owns the order.
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    /**
     * Get the payer that owns the order.
     */
    public function payer()
    {
        return $this->belongsTo('App\Payer');
    }

    /**
     * Get the manager (user) that owns the order.
     */
    public function manager()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
