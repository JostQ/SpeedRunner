<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    public function gpxs(){
        return $this->belongsTo(Gpx::class);
    }
}
