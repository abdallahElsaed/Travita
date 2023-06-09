<?php
namespace App\Models;
use App\Models\Plan;
use App\Models\Hotel;
use App\Models\Survey;
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

    // retrieve specific place by user id (add places to favorites)
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

/**
     * Retrieves the favored restaurants for a trip.
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphToMany
*/
    public function restaurantsTrip()
    {
        return $this->morphedByMany(Restaurant::class, 'trippable', 'tripplaces');
    }

    public function attractionsTrip()
    {
        return $this->morphedByMany(Attraction::class, 'trippable', 'tripplaces');
    }

    public function hotelsTrip()
    {
        return $this->morphedByMany(Hotel::class, 'trippable', 'tripplaces');
    }


    //
    public function plans(){
        return $this->hasMany(Plan::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function aiplans()
    {
        return $this->hasMany(Aiplan::class);
    }

      public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
