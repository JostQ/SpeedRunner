<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Request;
use App\Model\Info;
use App\Model\User;
use Eloquent;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->name;
        $userCapitalized = strtoupper(substr($user,0, 1) ) . substr($user, 1);

        return view('profile.index')
            ->with('user', $userCapitalized);
    }

    public function store()
    {

    }
}
