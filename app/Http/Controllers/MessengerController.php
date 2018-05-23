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

        $conversations = $user->friendships()->get();
        $messages = $user->conversations()->get();

        return view('messenger.index')
            ->with('friends',$conversations)
            ->with('messages',$messages);
    }

    public function conversation() {

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

//        insert->bdd
        $insert = new Message;
        $insert->message = $data['msg'];
        $insert->users_id = Auth::user()->id;
        $insert->recipient_id =$data['friend-id'];
        $insert->save();
        return Redirect::back();



    }
}
