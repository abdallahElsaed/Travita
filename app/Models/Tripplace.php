<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tripplace extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trip_id',
        'trippable_type',
        'trippable_id',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

}
