<?php

namespace App\Http\Controllers;

use App\Model\Actuality;
use App\Model\Info;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Image;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Request;

class ActuController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $info = User::find($users->id)->infos;
        $bdd= Actuality::get();


        $pict=$info['picture'];


        return view('actu.index')
            ->with('generales',$bdd)
//            ->with('namePost',$profil)
            ->with('profile_pict', $pict);
    }

//    insert->statut
    public function store(Request $request)
    {
        $data = Request::all();

//        validation des input
        $rules = ['message'=> 'string|required'];
        if (!empty($data['picture'])){
            $rules['picture'] = 'image|max:2048';

            $validator= Validator::make($data,$rules,[
                'message.string'=> 'Votre publication est invalide',
                'message.required'=> 'Votre publication est vide',
                'picture.image'=> 'Votre image n\'est pas au bon format',
                'picture.max:2048' =>'Votre image est trop volumineuse'
            ]);
        }
        else{
            $validator= Validator::make($data,$rules,[
                'message.string'=> 'Votre publication est invalide',
                'message.required'=> 'Votre publication est vide'
            ]);
        }

        if ($validator->fails()){

            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
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


            $destinationPath = public_path('/actuImages');
            $image->move($destinationPath, $photoName);

        }


//      insert->bdd
        $insert = new Actuality;
        $insert->message = $data['message'];
        $insert->users_id = Auth::user()->id;
        if (isset($data['picture'])){
            $insert->picture = $photoName;
        }
        $bdd= Actuality::get();
        if ($insert->save()){
            $success = 'Posté';

            return Redirect::back()
                ->with('success', $success)
                ->with('generales',$bdd);

        }


    }

}