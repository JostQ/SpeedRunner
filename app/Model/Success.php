<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Success extends Model
{
    public function success_to_users(){
        return $this->hasMany(SuccessToUser::class);
    }
}
