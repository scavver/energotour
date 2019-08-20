<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['content', 'max_discount', 'place_id'];

    // Получить место размещения, владеющее скидкой.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

}
