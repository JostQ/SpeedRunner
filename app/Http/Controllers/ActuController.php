<?php

namespace App\Http\Controllers;

use App\Model\Actuality;
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
        dd($data);
        $insert = new Actu();
        $insert->message = $data['message'];
        $insert->picture = $data['picture'];
        $insert->save();
        return view('actu.index');

    }

}