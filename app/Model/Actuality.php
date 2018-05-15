<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }
}
