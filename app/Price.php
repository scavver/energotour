<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['content', 'min_price', 'place_id'];

    // Получить место размещения, владеющее прайсом.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

}
