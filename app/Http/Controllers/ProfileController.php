<?php

namespace App\Http\Controllers;

use App\Model\Actuality;
use App\Model\Race;
use App\Model\SuccessHasUser;
use Illuminate\Support\Facades\Auth;
use Eloquent;
use App\Model\League;
use App\Model\Info;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Model\User;

class ProfileController extends Controller
{
    public function index()
    {
        //nombre d'amis
        $user = Auth::user();

        //dd($user);

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


        // Nombres de courses effectuées
        $race_done = Race::where('users_id', $user->id)->count();
        $actus= Actuality::count();
        $actus = intval($actus);
        $success = SuccessHasUser::where('users_id', Auth::id())->count();

        return view('profile.index')
            ->with('userid', $user->id)
            ->with('user', $userCapitalized)
            ->with('friend', $all_friend)
            ->with('level', $level)
            ->with('league', $league)
            ->with('list_league', $list_league)
            ->with('profile_pic', $profile_pic)
            ->with('all_races', $race_done)
            ->with('allFriends', $friends)
            ->with('success', $success)
            ->with('actus', $actus);
    }

    public function edit(Request $request, $id)
    {
        //$photoName = time().'.'.$request->image->getClientOriginalExtension();
        //$request->image->move(public_path('avatars'), $photoName);

        //DB::table('infos')->where('users_id', Auth::user()->id)->update(['picture' => $photoName]);


        // redimmmmension images
        $this->validate($request,[
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $photoName = time().'.'.$request->image->getClientOriginalExtension();

        $destinationPath = public_path('/avatars');
        $img = Image::make($image->getRealPath());
        $img->resize(200, 200, function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath. '/' . $photoName);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $photoName);

        Info::where('users_id', Auth::user()->id)->update(['picture' => $photoName]);


       return json_encode(['picture' => $photoName]);

    }
}
