<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Lista extends Model
{
    use HasFactory;

    static $rules = [
		'username' => 'required',
		'public' => 'required',
		'user_list_count' => 'required',
		'visible' => 'required',
    ];

    protected $fillable = [
        'title',
        'description',
        'public',
        'user_list_count',
        'username',
        'visible'
    ];

    protected $hidden = [

    ];

    public function user() {
        return $this->belongsTo('App\Models\User','username','username');
    }

    public function savesUser() {
        return $this->belongsToMany(User::class,'listas_users','lista_id','user_id')->withTimestamps();
    }

    //Query
    public function scopeVisibility($query, $visibility) {
        return $query->where("public",$visibility);
    }

    public function scopeUsername($query, $username) {
        return $query->where("username",$username);
    }
}
