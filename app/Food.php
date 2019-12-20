<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hotel_id', 'included', 'extra'];

    // Получить отель, владеющий этой информацией по питанию.
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
