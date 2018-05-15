<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public function leagues(){
        return $this->hasMany(League::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
