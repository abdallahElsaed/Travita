<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'name',
    ];
     public function tripPlaces()
    {
        return $this->hasMany(Tripplace::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
