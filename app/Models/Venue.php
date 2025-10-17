<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['name', 'location'];

    // Relación: una sede tiene muchos eventos
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
