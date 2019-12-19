<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['pivot'];

    /**
     * Get the orders for the tourist.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_tourist', 'tourist_id', 'order_id');
    }
}
