<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    // Получить место, владеющее данной обложкой.
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
