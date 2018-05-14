<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressionController extends Controller
{
    public function Index()
    {
        return view('progression.index');
    }
}
