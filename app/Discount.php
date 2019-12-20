<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'max_discount', 'hotel_id'];

    /**
     * Get the hotel that owns a discount.
     */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

}
