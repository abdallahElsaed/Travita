<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public function favorites()
    {
        return $this->morphToMany(Favorite::class, 'favoritable', 'favorites');
    }
}
