<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Lista;

//Añadimos la clase JWTSubject
use Tymon\JWTAuth\Contracts\JWTSubject;

//Añadimos la implementación de JWT en nuestro modelo
class User extends Authenticatable implements JWTSubject
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'description',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'email_verified_at',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //API TOKEN
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function listas() {
        return $this->hasMany('App\Models\Lista','username','username');
    }

    public function savedLists() {
        return $this->belongsToMany(Lista::class,'listas_users','user_id','lista_id')->withTimestamps();
    }

    public function friends() {
        return $this->belongsToMany(User::class,'friends','user_requested_id','user_reciever_id')->withTimestamps();
    }
}
