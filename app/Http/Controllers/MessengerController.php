<?php

namespace App\Http\Controllers;

use App\Model\Friendship;
use App\Model\Message;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Request;
use Image;

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

        $truc = Friendship::where('friend_id', Auth::id())->where('users_id', $mon_ami)->first();

        $user = Auth::user();

        $messages['sender'] = $user->conversations($conversation->id);

        $messages['answer'] = User::find($mon_ami)->conversations($truc->id) ;

        return response()->json( $messages );

    }

    public function send(){
        $data = Request::all();

//        validation de l'input
        $rules = ['msg'=> 'string|required'];
        if (!empty($data['picture'])){
            $rules['picture'] = 'image|max:2048';

            $validator= Validator::make($data,$rules,[
                'msg.string'=> 'Votre publication est invalide',
                'msg.required'=> 'Votre publication est vide',
                'picture.image'=> 'Votre image n\'est pas au bon format',
                'picture.max:2048' =>'Votre image est trop volumineuse'
            ]);
        }
        else{
            $validator= Validator::make($data,$rules,[
                'msg.string'=> 'Votre publication est invalide',
                'msg.required'=> 'Votre publication est vide'
            ]);
        }

        if ($validator->fails()){
            return json_encode($validator->errors());
        }

        //      traitement de l'image
        if (!empty($data['picture'])){

            $image = $data['picture'];
            $photoName= time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/thumbnails');
            $img = Image::make($image->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$photoName);


            $destinationPath = public_path('/messengerImages');
            $image->move($destinationPath, $photoName);

        }


        $conversation = Friendship::where('friend_id', $data['friend-id'])->where('users_id', Auth::id())->first();




//        insert->bdd
        $insert = new Message;
        $insert->message = $data['msg'];
        if (isset($data['picture'])){
            $insert->picture = $photoName;
        }
        $insert->users_id = Auth::user()->id;
        $insert->recipient_id =$data['friend-id'];
        $insert->friendship_id = $conversation->id;
        $insert->save();


        if(isset($data['picture']))[
            $data['picture'] = $photoName
        ];

        $data['id'] = Auth::user()->id;
        return response()->json($data);



    }
}
