<?php

namespace App\Http\Controllers;

use App\Model\Friendship;
use App\Model\League;
use Illuminate\Support\Facades\Auth;
use Request;
use App\Model\Info;
use App\Model\User;
use Eloquent;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();


        $friends = User::find($user->id)->friendships;


        $all_friend = $friends->count();


        $infos = User::find($user->id)->infos;

        $firstName = $infos['firstname'];
        $lastName = $infos['lastname'];

        $firstName = strtoupper(substr($firstName,0, 1) ) . substr($firstName, 1);
        $lastName = strtoupper(substr($lastName,0, 1) ) . substr($lastName, 1);

        $userCapitalized = $firstName . ' ' . $lastName  . ' (' . $user->name . ')';

        $league = League::find($infos['leagues_id'])['name'];

        $level = $infos['level'];


        return view('profile.index')
            ->with('user', $userCapitalized)
            ->with('friend', $all_friend)
            ->with('level', $level)
            ->with('league', $league);
    }

    public function store()
    {

    }
}
