<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['path'];

    // Получить место, владеющее данной обложкой.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
