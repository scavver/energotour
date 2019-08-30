<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    // Связанная с моделью таблица.
    protected $table = 'about';

    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['place_id', 'description', 'rules_of_settlement', 'included_services', 'address', 'territory', 'reconstruction', 'children'];

    // Получить отель, владеющий этим описанием.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
