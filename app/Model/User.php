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
        return $this->hasMany(Actuality::class, 'users_id');
    }
    public function friendships(){
        return $this->hasMany(Friendship::class, 'users_id');
    }
    public function gpxs(){
        return $this->hasMany(Gpx::class, 'users_id');
    }
    public function infos(){
        return $this->hasOne(Info::class, 'users_id');
    }
    public function messages(){
        return $this->hasMany(Message::class, 'users_id');
    }
    public function success_has_user(){
        return $this->hasMany(SuccessHasUser::class, 'users_id');
    }

    public function success()
    {
        return $this->belongsToMany(Success::class, 'success_has_users', 'users_id', 'success_id');
    }
    
    public function races(){
        return $this->hasMany(Race::class, 'users_id');
    }

    public function conversations($friendship_id){
        return $this->hasMany(Message::class, 'users_id')->where('friendship_id', $friendship_id)->get();
    }

}
