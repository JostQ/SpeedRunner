<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'friend_id');
    }
}
