<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['enabled', 'name', 'title', 'description', 'type_id', 'region_id', 'slug', 'lat', 'lng'];

    /**
     * The properties that belong to the hotel.
     */
    public function properties()
    {
        return $this->belongsToMany('App\Property', 'hotel_property', 'hotel_id', 'property_id');
    }

    /**
     * Get the type that owns the hotel.
     */
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    /**
     * Get the region that owns the hotel.
     */
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    /**
     * Get the hotel's image.
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    /**
     * Get the price record associated with the hotel.
     */
    public function price()
    {
        return $this->hasOne('App\Price');
    }

    /**
     * Get the discount record associated with the hotel.
     */
    public function discount()
    {
        return $this->hasOne('App\Discount');
    }

    /**
     * Get the galleries for the hotel.
     */
    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }

    /**
     * Get the rooms for the hotel.
     */
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    /**
     * Get the about record associated with the hotel.
     */
    public function about()
    {
        return $this->hasOne('App\About');
    }

    /**
     * Get the food record associated with the hotel.
     */
    public function food()
    {
        return $this->hasOne('App\Food');
    }

    /**
     * Get the infrastructure record associated with the hotel.
     */
    public function infrastructure()
    {
        return $this->hasOne('App\Infrastructure');
    }

    /**
     * Get the treatment record associated with the hotel.
     */
    public function treatment()
    {
        return $this->hasOne('App\Treatment');
    }

    /**
     * Get the orders for the hotel.
     */
    public function orders()
    {
        return $this->hasMany('App\Hotel');
    }
}
