<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'infrastructure';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hotel_id', 'pool', 'beach', 'entertainments', 'sport', 'wi_fi', 'parking', 'extra'];

    // Получить отель, владеющий этой информацией по инфраструктуре.
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
