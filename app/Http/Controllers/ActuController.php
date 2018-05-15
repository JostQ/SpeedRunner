<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActuController extends Controller
{
    public function index()
    {
        return view('actu.index');
    }
}
