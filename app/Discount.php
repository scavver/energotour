<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['content', 'max_discount', 'hotel_id'];

    // Получить место размещения, владеющее скидкой.
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

}
