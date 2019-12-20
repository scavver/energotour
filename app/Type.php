<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    // Определяет необходимость отметок времени для модели.
    public $timestamps = false;

    // Получить места типа.
    public function hotels()
    {
        return $this->hasMany('App\Hotel');
    }

}
