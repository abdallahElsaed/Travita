<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;


    protected $fillable = [
        'img_id',
        'rate',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
