<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    // Атрибуты, для которых разрешено массовое назначение.
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Скрытие атрибутов при преобразовании в массив или JSON
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Атрибуты, которые нужно преобразовать в нативный тип.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Получить достопримечательности созданные пользователем
    public function landmarks()
    {
        return $this->hasMany('App\Landmark');
    }
}
