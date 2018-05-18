<?php

namespace App\Http\Controllers;

use App\Model\Actuality;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Validator;
use Request;

class ActuController extends Controller
{
    public function index()
    {
        $bdd= Actuality::get();
        return view('actu.index')
            ->with('generales',$bdd);
    }

//    insert->statut
    public function store()
    {
        $data = Request::all();

//        validation des input
        $rules = ['message'=> 'string|required'];
        if (!empty($data['picture'])){
            $rules['picture'] = 'image';

            $validator= Validator::make($data,$rules,[
                'message.string'=> 'Votre publication est invalide',
                'message.required'=> 'Votre publication est vide',
                'picture.image'=> 'Votre image n\'est pas au bon format'
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
            $file = $data['picture'];
            $file->store('public');
            $ext = $file->getClientOriginalExtension();
            $file->storeAs('public','mon_nom.'.$ext);
            $file->move(public_path('/actuImages/'),'tot.'.$ext);
        }




//      insert->bdd
        $insert = new Actuality;
        $insert->message = $data['message'];
        $insert->users_id = Auth::user()->id;
        if (isset($data['picture'])){
            $insert->picture = $data['picture'];
        }
        $bdd= Actuality::get();
        if ($insert->save()){
            $success = 'Posté';

            return view('actu.index')->with('success', $success)->with('generales',$bdd);
        }


    }

}