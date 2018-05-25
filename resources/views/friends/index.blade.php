@extends('layouts.app')

@section('content')

    <div class="container mt-2 mb-5 pt-5" id="profile">
        <div class="row align-items-center">
            <div class="col-sm-2 col-lg-2 text-center">

                <!-- Photo de profil -->

                <img src="{{asset('avatars/' . $profile_pic)}}"
                     alt="runneuse"
                     class="rounded-circle mt-5 mb-4"
                     id="imgprofil">
                <form method="post" id="CHAGASSE" enctype="multipart/form-data">
                    @csrf
                    <input type="file" required id="profilpic" class="image"
                           name="profilpic"/>
                    <label for="profilpic"
                           class="fileContainer btn btn-primary">
                        Modifier <i class="fas fa-camera"></i>
                    </label>
                </form>
            </div>

            <!--Info coureurs-->
            <div class="col-sm-6 mt-2 col-lg-6" id="infos">
                <div class="mb-2">
                    <h4> {{ $displayfriend }}</h4>
                </div>
                <p> <i class="fas fa-user-friends"></i> Nombres d'amis : {{ $friend }}</p>
                <p> <i class="fas fa-chart-line"></i> Niveau : {{ $level }}</p>
                <p> <i class="fas fa-list"></i> {{ $league }}</p>
                <p> <i class="far fa-thumbs-up"></i> Nombre de courses effectuées : {{ $all_races }}</p>
            </div>

            <div class="col-sm-4 col-lg-4" id="runfriend">
                <div class="mt-5">
                    <p>Ils ont le même niveau que vous</p>
                </div>

            </div>
        </div>


        <ul class="nav nav-tabs mt-5 pt-2" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="actualite-tab" data-toggle="tab"
                   href="#actualite" role="tab"
                   aria-controls="actualite" aria-selected="true">Fil
                    d'actualité</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="success-tab" data-toggle="tab"
                   href="#defi"
                   role="tab" aria-controls="profile"
                   aria-selected="false">Succès</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="stats-tab" data-toggle="tab"
                   href="#contact" role="tab"
                   aria-controls="statistiques" aria-selected="false">Statistiques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="gpx-tab" data-toggle="tab" href="#gpx"
                   role="tab" aria-controls="gpx"
                   aria-selected="false">Import de vos données GPX</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="classement-tab" data-toggle="tab"
                   href="#classement" role="tab"
                   aria-controls="classement"
                   aria-selected="false">Classement</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="courses-tab" data-toggle="tab"
                   href="#courses" role="tab"
                   aria-controls="classement" aria-selected="false">Listes des
                    courses</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel"
                 aria-labelledby="home-tab"></div>
        </div>

    </div>

@endsection