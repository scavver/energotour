<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    // Связанная с моделью таблица.
    protected $table = 'food';

    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['place_id', 'included', 'extra'];

    // Получить отель, владеющий этой информацией по питанию.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
