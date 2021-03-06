<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function gpxs(){
        return $this->belongsTo(Gpx::class);
    }
}
