<?php

namespace App\Http\Controllers;


use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {

        // Récupère les données de la table info
        $user = DB::table('infos')->where('users_id', Auth::user()->id)->first();

        // Récupère les données de la table Races, dans la limite des 7 derniers, pour mettre à jour les stats.
        $kmPerDay = DB::table('races')->where('users_id', Auth::user()->id)->orderBy('id', 'desc')->take(7)->get();

        return view('statistics.index')
            ->with('stats', $user)
            ->with('kmPerDay', $kmPerDay);

    }

    public function indexFriend(Request $request)
    {
        // Récupère les données de la table info
        $user = DB::table('infos')->where('users_id', $request->id)->first();

        // Récupère les données de la table Races, dans la limite des 7 derniers, pour mettre à jour les stats.
        $kmPerDay = DB::table('races')->where('users_id', $request->id)->orderBy('id', 'desc')->take(7)->get();

        return view('statistics.index')
            ->with('stats', $user)
            ->with('kmPerDay', $kmPerDay);
    }
}
