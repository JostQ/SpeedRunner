<?php

namespace App\Http\Controllers;

use App\Actu;
use Request;

class ActuController extends Controller
{
    public function index()
    {
        $bdd= Actu::get();
        return view('actu.index')
            ->with('generales',$bdd);
    }

//    insert->statut
    public function store()
    {
        $data = Request::all();
        dd($data);
        $insert = new Actu();
        $insert->message = $data['message'];
        $insert->picture = $data['picture'];
        $insert->save();
        return view('actu.index');

    }

}