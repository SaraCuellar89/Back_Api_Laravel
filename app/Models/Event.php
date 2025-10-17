<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'date', 'venue_id'];
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
