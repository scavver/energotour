<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['name', 'cover'];

    // Определяет необходимость отметок времени для модели.
    public $timestamps = false;

    // Получить места размещения категории.
    public function places()
    {
        return $this->hasMany('App\Place');
    }

}
