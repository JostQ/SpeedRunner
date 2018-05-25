<?php

namespace App\Http\Controllers;

use App\Model\SuccessHasUser;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class SuccessController extends Controller
{
    public function index()
    {
        $user=Auth::user()->success()->get();

        return view('success.index')
            ->with('user', $user);
    }
}
