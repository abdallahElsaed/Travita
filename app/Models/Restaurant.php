<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function restaurantHours(){
        return $this->hasMany(Restaurant_hour::class);
    }

    // by
    public function favorites()
    {
            return $this->morphToMany(Favorite::class, 'favoritable', 'favorites');
    }
    public function addPlaceTrip()
    {
        return $this->morphToMany(Tripplace::class, 'trippable', 'tripplaces');
    }
}
