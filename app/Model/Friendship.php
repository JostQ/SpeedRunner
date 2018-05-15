<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }
}
