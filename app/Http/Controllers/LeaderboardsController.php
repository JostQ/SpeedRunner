<?php

namespace App\Http\Controllers;

use App\Model\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardsController extends Controller
{
    public function index()
    {

        $leagues = League::


        return view('leaderboards.index');
    }


}
