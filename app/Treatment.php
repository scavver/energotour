<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    // Связанная с моделью таблица.
    protected $table = 'treatment';

    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['place_id', 'profiles', 'types'];

    // Получить отель, владеющий этой информацией по лечению.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
