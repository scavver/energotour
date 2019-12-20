<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['documentable_id', 'documentable_type', 'path'];

    // Получить все модели, обладающие documentable
    public function documentable()
    {
        return $this->morphTo();
    }
}
