<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'treatment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hotel_id', 'profiles', 'types'];

    // Получить отель, владеющий этой информацией по лечению.
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
