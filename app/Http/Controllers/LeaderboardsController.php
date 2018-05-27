<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaderboardsController extends Controller
{
    public function index()
    {
        $usersLeague = DB::table('infos')->find(Auth::user()->id)->leagues_id;
        $leaderboards = DB::table('infos')
            ->where('leagues_id', '=', $usersLeague)->orderBy('level', 'DESC')->orderBy('exp','desc')->get();

        return view('leaderboards.index')
            ->with('leaderboards', $leaderboards);
    }

    public function indexFriend(Request $request)
    {
        $usersLeague = DB::table('infos')->find($request->id)->leagues_id;
        $leaderboards = DB::table('infos')
            ->where('leagues_id', '=', $usersLeague)->orderBy('level', 'DESC')->orderBy('exp','desc')->get();

        return view('leaderboards.index')
            ->with('leaderboards', $leaderboards);
    }


}
