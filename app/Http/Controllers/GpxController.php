<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GpxController extends Controller
{
    public function index()
    {
        return view('gpx.index');
    }
}
