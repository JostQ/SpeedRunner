@extends('layouts.app')

@section('content')
    <div class="container mt-2 mb-5 pt-5" id="profile">
        <div class="row align-items-center">
            <div class="col-sm-2">
                <img src="https://1.bp.blogspot.com/-TWLe47tl4gE/V-jRzhvNs7I/AAAAAAAAB1A/YRyA08g7vYM3V4RO2lQX9CM-pDJ6NRvkgCLcB/s1600/IMG_6090_opt.jpg"
                     alt="runneuse"
                     class="rounded-circle mt-5 mb-4"
                     id="picprofil">
            </div>

            <div class="col-sm-6 mt-2" id="infos">
                <div class="mb-2"><h4> {{ $user }}</h4>
                </div>
                <p>Nombres d'amis : {{ $friend }}</p>
                <p>Niveau : {{ $level }}</p>
                <p>{{ $league }}</p>

            </div>

            <div class="col-sm-4">
                <div class="mt-5">Ils ont le même niveau que vous</div>
                <div class="list">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Cras justo odio
                            <img src="{{asset('images/girlrun3.jpg')}}" alt="listrunner" class="listrun rounded-circle">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <img src="{{asset('images/girlrun3.jpg')}}" alt="listrunner" class="listrun rounded-circle">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <img src="{{asset('images/girlrun3.jpg')}}" alt="listrunner" class="listrun rounded-circle">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <img src="{{asset('images/girlrun3.jpg')}}" alt="listrunner" class="listrun rounded-circle">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <img src="{{asset('images/girlrun3.jpg')}}" alt="listrunner" class="listrun rounded-circle">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <img src="{{asset('images/girlrun3.jpg')}}" alt="listrunner" class="listrun rounded-circle">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Morbi leo risus
                            <img src="{{asset('images/girlrun3.jpg')}}" alt="listrunner" class="listrun rounded-circle">
                        </li>
                    </ul>
                </div>

            </div>
        </div>


        <ul class="nav nav-tabs mt-5 pt-2" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="actualite-tab" data-toggle="tab" href="#actualite" role="tab"
                   aria-controls="actualite" aria-selected="true">Fil d'actualité</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="defi-tab" data-toggle="tab" href="#defi" role="tab" aria-controls="profile"
                   aria-selected="false">Défis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="stats-tab" data-toggle="tab" href="#contact" role="tab"
                   aria-controls="statistiques" aria-selected="false">Statistiques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="gpx-tab" data-toggle="tab" href="#gpx" role="tab" aria-controls="gpx"
                   aria-selected="false">Import de vos données GPX</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="classement-tab" data-toggle="tab" href="#classement" role="tab"
                   aria-controls="classement" aria-selected="false">Classement</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
        </div>

    </div>
@endsection

@section('page-specific-scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script>
        $('#actualite-tab').click(function(e) {
            $('#home').addClass('active show')
            $('#home').load('{{ route('actu') }}');
        })
        $('#stats-tab').click(function(e) {
            $('#home').addClass('active show')
            $('#home').load('{{ route('statistics') }}');
        })
        $('#gpx-tab').click(function(e) {
            $('#home').addClass('active show')
            $('#home').load('{{ route('import_gpx') }}');
        })
    </script>
@endsection