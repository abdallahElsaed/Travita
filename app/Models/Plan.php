<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'days',
        'price',
        'latitude',
        'longitude',
        'user_id',
        'city',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
