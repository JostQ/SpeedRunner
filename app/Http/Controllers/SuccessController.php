<?php

namespace App\Http\Controllers;

use App\Model\SuccessHasUser;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuccessController extends Controller
{
    public function index()
    {
        $user=Auth::user()->success()->get();

        return view('success.index')
            ->with('user', $user);
    }

    public function indexFriend(Request $request)
    {
        $user= User::find($request->id)->success()->get();

        return view('success.index')
            ->with('user', $user);
    }
}
