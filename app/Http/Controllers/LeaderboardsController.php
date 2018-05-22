<?php

namespace App\Http\Controllers;

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


}
