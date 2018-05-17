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
        //nombre d'amis
        $user = Auth::user();

        $friends = User::find($user->id)->friendships;

        $all_friend = $friends->count();

        $infos = User::find($user->id)->infos;

        // Photo de profil
        $profile_pic = Info::find($infos->id)->picture;

        $firstName = $infos['firstname'];
        $lastName = $infos['lastname'];

        $firstName = strtoupper(substr($firstName,0, 1) ) . substr($firstName, 1);
        $lastName = strtoupper(substr($lastName,0, 1) ) . substr($lastName, 1);

        // Majuscule
        $userCapitalized = $firstName . ' ' . $lastName  . ' (' . $user->name . ')';

        // Niveau et ligue
        $league = League::find($infos['leagues_id'])['name'];

        $level = $infos['level'];

        $all_league = Info::all()->where('leagues_id', $infos->leagues_id);

        $list_league = [];
        foreach ($all_league as $item){
            if ($item->users_id !== $user->id){
                $list_league[] = $item;
            }
        }

        return view('profile.index')
            ->with('user', $userCapitalized)
            ->with('friend', $all_friend)
            ->with('level', $level)
            ->with('league', $league)
            ->with('list_league', $list_league)
            ->with('profile_pic', $profile_pic);
    }

    public function store()
    {

    }
}
