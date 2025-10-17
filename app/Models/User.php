<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users'; // nombre explícito de la tabla

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'username',
        'password',
        'token',
    ];

    // Oculta el password y el token cuando devuelves usuarios en JSON
    protected $hidden = [
        'password',
        'token',
    ];
}