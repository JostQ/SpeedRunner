<?php

namespace App\Http\Controllers;

use App\Model\Friendship;
use App\Model\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Request;

class MessengerController extends Controller
{
    public  function  index()
    {
        $user = Auth::user();

        $friends = $user->friendships()->get();

        return view('messenger.index')
            ->with('friends',$friends);
    }

    public function conversation() {
        $values = Request::all();

        $mon_ami = $values['id'];

        $conversation = Friendship::where('friend_id', $mon_ami)->where('users_id', Auth::id())->first();

        $user = Auth::user();

        $messages = $user->conversations($conversation->id);

        return response()->json( $messages );

    }

    public function send(){
        $data = Request::all();
//        validation de l'input
        $rules = ['msg'=> 'string|required'];

        $validator= Validator::make($data,$rules,[
            'msg.string'=> 'Votre message est invalide',
            'msg.required'=> 'Votre message est vide'
        ]);

        if ($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }


        $conversation = Friendship::where('friend_id', $data['friend-id'])->where('users_id', Auth::id())->first();




//        insert->bdd
        $insert = new Message;
        $insert->message = $data['msg'];
        $insert->users_id = Auth::user()->id;
        $insert->recipient_id =$data['friend-id'];
        $insert->friendship_id = $conversation->id;
        $insert->save();
        return Redirect::back();



    }
}
