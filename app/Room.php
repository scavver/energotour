<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = [
        'name',
        'place_id',
        'gallery_id',
        'number_of_rooms',
        'category',
        'view',
        'number_of_places',
        'number_of_extra_places',
        'area',
        'furniture',
        'equipment',
        'bathroom',
        'service'
    ];

    // Получить объект размещения, владеющий номером.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    // Получить галерею номера.
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }
}
