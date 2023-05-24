<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aiplan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_data',
        'user_id',
    ];
    protected $casts = ['plan_data' => 'json'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
