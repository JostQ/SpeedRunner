<?php

namespace App\Http\Controllers;

use App\Model\Gpx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GpxController extends Controller
{
    public function index()
    {
        return view('gpx.index');
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
