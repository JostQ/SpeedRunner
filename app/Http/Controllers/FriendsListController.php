<?php

namespace App\Http\Controllers;

use App\Model\Friendship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsListController extends Controller
{
    public function index()
    {
        $listOfFriends = Friendship::where('users_id', Auth::id())->get();

        return view('friendsList.index')
        ->with('listOfFriends', $listOfFriends);
    }
}
