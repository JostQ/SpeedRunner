<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    public function infos(){
        return $this->belongsTo(Info::class);
    }
}
