<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = [
        'name',
        'hotel_id',
        'gallery_id',
        'number_of_rooms',
        'category',
        'view',
        'number_of_hotels',
        'number_of_extra_hotels',
        'area',
        'furniture',
        'equipment',
        'bathroom',
        'service'
    ];

    // Получить объект размещения, владеющий номером.
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    // Получить галерею номера.
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }
}
