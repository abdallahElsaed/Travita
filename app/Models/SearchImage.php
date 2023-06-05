<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'user_id'
    ];
}
