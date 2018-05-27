<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{

    protected $fillable = [
        'firstname', 'lastname', 'users_id',
    ];

    public function leagues(){
        return $this->belongsTo(League::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function conversations(){
        return $this->hasManyThrough('App\Model\Message', 'App\Model\Friendship', 'users_id', 'users_id', 'id', 'id');
    }
}
