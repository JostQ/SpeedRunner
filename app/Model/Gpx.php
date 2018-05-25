<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gpx extends Model
{
    protected $table = 'gpxs';

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function waypoints(){
        return $this->hasMany(Waypoint::class, 'gpx_id');
    }

    public function races(){
        return $this->hasOne(Race::class, 'gpx_id');
    }
}
