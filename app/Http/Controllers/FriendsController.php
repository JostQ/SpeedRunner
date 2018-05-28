<?php

namespace App\Http\Controllers;

use App\Model\Actuality;
use App\Model\SuccessHasUser;
use Illuminate\Http\Request;
use App\Model\Race;
use Illuminate\Support\Facades\Auth;
use Eloquent;
use App\Model\Friendship;
use App\Model\League;
use App\Model\Info;
use Redirect;
use App\Model\User;

class FriendsController extends Controller
{
    public function index($id)
    {
        if($id == Auth::id()) {
            return Redirect::back();
        }
        //nombre d'amis
        $user = User::find($id);

        $friends = User::find($user->id)->friendships;

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

        // Nombres de courses effectuées
        $race_done = Race::where('users_id', $user->id)->count();

        $actus= Actuality::where('users_id', $id)->count();
        $actus = intval($actus);
        $success = SuccessHasUser::where('users_id', $id)->count();

        return view('friends.index')
            ->with('userid', $user->id)
            ->with('user', $userCapitalized)
            ->with('friends', $friends)
            ->with('level', $level)
            ->with('league', $league)
            ->with('profile_pic', $profile_pic)
            ->with('all_races', $race_done)
            ->with('success', $success)
            ->with('actus', $actus);
    }


    public function add(Request $request)
    {
        // Ajout ami

        if(count(Friendship::where('friend_id', $request->input('friends_id'))->where('users_id', Auth::id())->get()) === 0){

            $addMe = new Friendship();


            $addMe->friend_id = Auth::id();

            $addMe->users_id = $request->input('friends_id');

            $addMe->save();

            $addFriend = new Friendship();

            $addFriend->friend_id = $request->input('friends_id');

            $addFriend->users_id = Auth::id();

            if ($addFriend->save()){
                $message = 'Nouvel ami ajouté';
                $json = ['status' => 'OK', 'success' => $message];
                return json_encode($json);
            }

        }

        return json_encode(['errors' => 'Vous êtes déjà amis']);



    }

    public function delete(Request $request)
    {

        Friendship::where('friend_id', $request->input('friends_id'))->where('users_id', Auth::id())->delete();

        return json_encode(['errors' => "Vous n'êtes plus amis"]);
    }


}
