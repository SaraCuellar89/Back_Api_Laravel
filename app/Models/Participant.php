<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    // Permitir asignación masiva en estos campos
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'event_id',
    ];

    // Relación: un participante pertenece a un evento
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
