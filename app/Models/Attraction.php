<?php

namespace App\Models;

use App\Models\Tripplace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attraction extends Model
{
    use HasFactory;

    public function attractionHours(){
        return $this->hasMany(Attraction_hour::class);
    }

        public function favorites()
    {
        return $this->morphToMany(Tripplace::class, 'trippable', 'tripplaces');
    }
    public function addPlaceTrip()
    {
        return $this->morphToMany(Tripplace::class, 'trippable', 'tripplaces');
    }
}
