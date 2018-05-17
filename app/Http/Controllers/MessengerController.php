<?php

namespace App\Http\Controllers;

use App\Model\Friendship;
use App\Model\Message;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public  function  index()
    {   $bddfriends= Friendship::select('users_id')->distinct()->get();
        $bddmessages= Message::select()->get();
        return view('messenger.index')
            ->with('friends',$bddfriends)
            ->with('messages',$bddmessages);
    }
}
