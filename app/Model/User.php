<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function actualities(){
        return $this->hasMany(Actuality::class);
    }
    public function friendships(){
        return $this->hasMany(Friendship::class, 'users_id');
    }
    public function gpxs(){
        return $this->hasMany(Gpx::class);
    }
    public function infos(){
        return $this->hasOne(Info::class, 'users_id');
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function success_to_users(){
        return $this->hasMany(SuccessToUser::class);
    }
    public function races(){
        return $this->hasMany(Race::class);
    }
}
