<?php

namespace App\Models;

use App\Models\Tripplace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    public function favorites()
    {
        return $this->morphToMany(Favorite::class, 'favoritable', 'favorites');
    }

    public function addPlaceTrip()
    {
        return $this->morphToMany(Tripplace::class, 'trippable', 'tripplaces');
    }
}
