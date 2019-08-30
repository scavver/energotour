<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    // Связанная с моделью таблица.
    protected $table = 'infrastructure';

    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['place_id', 'pool', 'beach', 'entertainments', 'sport', 'wi_fi', 'parking', 'extra'];

    // Получить отель, владеющий этой информацией по инфраструктуре.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
