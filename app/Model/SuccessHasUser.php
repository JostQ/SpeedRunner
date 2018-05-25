<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuccessHasUser extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function success(){
        return $this->belongsTo(Success::class);
    }
}
