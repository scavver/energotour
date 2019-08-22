<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = ['title', 'description', 'content', 'slug'];
}
