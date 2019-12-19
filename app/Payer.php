<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
    ];

    /**
     * Get the orders for the payer.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
