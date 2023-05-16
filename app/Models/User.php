<?php
namespace App\Models;
use App\Models\Plan;
use App\Models\Hotel;
use App\Models\Attraction;
use App\Models\Restaurant;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lname',
        'fname',
        'username',
        'email',
        'password',
        'phono',
        'birthday',
        'gender',
        'country',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

    // retrieve specific place by user id
    public function restaurants()
    {
        return $this->morphedByMany(Restaurant::class, 'favoritable', 'favorites');
    }

    public function attractions()
    {
        return $this->morphedByMany(Attraction::class, 'favoritable', 'favorites');
    }

    public function hotels()
    {
        return $this->morphedByMany(Hotel::class, 'favoritable', 'favorites');
    }

    public function plans(){
        return $this->hasMany(Plan::class);
    }
}
