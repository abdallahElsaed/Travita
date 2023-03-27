<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction_hour extends Model
{
    use HasFactory;

    public function attraction(){
        return $this->belongsTo(Attraction::class);
    }
}
