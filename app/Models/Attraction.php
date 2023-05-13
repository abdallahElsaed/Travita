<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    public function attractionHours(){
        return $this->hasMany(Attraction_hour::class);
    }

    public function favorites()
{
    return $this->morphToMany(Favorite::class, 'favoritable', 'favorites');
}
}
