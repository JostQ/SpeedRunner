<?php

namespace App\Http\Controllers;

use App\Model\Gpx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GpxController extends Controller
{
    public function index()
    {
        $numberOfRacesDone = DB::table('races')->where('users_id', Auth::user()->id)->count();
        return view('gpx.index')
            ->with('numberOfRacesDone', $numberOfRacesDone);
    }

    public function add(Request $request)
    {
        $validatedData= $request->validate([
            'gpxFile' => 'required|mimes:xml|'
        ]);

        $path = $request->file('gpxFile')->store('');
        $add = new Gpx();
        $add->gpx = $path;
        $add->users_id = Auth::user()->id;

        $add->save();
    }
}
