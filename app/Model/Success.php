<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Success extends Model
{
    protected $table = 'success';

    public function success_to_users(){
        return $this->hasMany(SuccessHasUser::class);
    }
}
