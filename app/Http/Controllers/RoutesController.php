<?php

namespace App\Http\Controllers;

use App\Model\Race;
use Illuminate\Support\Facades\Auth;

class RoutesController extends Controller
{
    public function index(){

        $racesDone = Race::where('users_id', Auth::user()->id)->paginate(5);

        return view('routes.index')
            ->with('racesDone', $racesDone);
    }
}
