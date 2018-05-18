<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoutesController extends Controller
{
    public function index(){

        $racesDone = DB::table('races')->where('users_id', Auth::user()->id)->get();

        return view('routes.index')
            ->with('racesDone', $racesDone);
    }
}
