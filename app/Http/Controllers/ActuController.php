<?php

namespace App\Http\Controllers;

use App\Actu;
use Illuminate\Http\Request;

class ActuController extends Controller
{
    public function index()
    {
        return view('actu.index');
    }

//    Statut
    public function store(){
        $data= (new \Illuminate\Http\Request)->all();
        $insert =new Actu();
        $insert->message = $data['statut'];
        $insert->save();


    }

//    upload-img
    public function store2(){
        $request=Request::all();
    }
}
