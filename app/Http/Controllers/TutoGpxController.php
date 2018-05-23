<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutoGpxController extends Controller
{
        public function index()
        {
            return view('tutogpx.index');
        }
}
