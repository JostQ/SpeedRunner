@extends('layouts.app')

@section('content')
    <div class="container mt-2 mb-5 pt-5" id="profile">
        <div class="row align-items-center">
            <div class="col-sm-2 col-lg-2">
                <img src="{{asset('avatars/' . $profile_pic)}}"
                     alt="runneuse"
                     class="rounded-circle mt-5 mb-4"
                     id="imgprofil"
                     width="180em">
                <form method="post" id="CHAGASSE">
                    @csrf
                    <input type="file"  id="profilpic" name="profilpic"/>
                    <label for="profilpic"  class="fileContainer btn btn-primary">
                        Modifier <i class="fas fa-camera"></i>
                    </label>
                </form>
            </div>

            <!--Info coureurs-->
            <div class="col-sm-6 mt-2 col-lg-6" id="infos">
                <div class="mb-2"><h4> {{ $user }}</h4>
                </div>
                <p>Nombres d'amis : {{ $friend }}</p>
                <p>Niveau : {{ $level }}</p>
                <p>{{ $league }}</p>
            </div>

            <!--Liste de coureurs même niveau-->
            <div class="col-sm-4 col-lg-4">
                <div class="mt-5">Ils ont le même niveau que vous</div>
                <div class="list">
                    <ul class="list-group">
                        @foreach($list_league as $item)
                            <a href="#"><li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                                {{ $item->firstname }} {{ $item->lastname }}
                                @if(isset($item->picture))
                                    <img src="{{asset('images/' . $item->picture)}}"
                                         alt="listrunner"
                                         class="listrun rounded-circle">
                                @else
                                    <img src="{{asset('images/girlrun4.jpg')}}"
                                         alt="listrunner"
                                         class="listrun rounded-circle">
                                @endif
                                </li></a>
                        @endforeach
                    </ul>
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
                <a class="nav-link" id="defi-tab" data-toggle="tab" href="#defi"
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

@section('page-specific-scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">

    </script>
    <script>
        let pageToGet = 2;
        // Load AJAX des différentes pages
        // @TODO: Passer les .load() en .ajax().

        $('#actualite-tab').click(function (e) {
            $('#home').addClass('active show')
            $('#home').load('{{ route('actu') }}');
        })
        $('#stats-tab').click(function (e) {
            $('#home').addClass('active show')
            $('#home').load('{{ route('statistics') }}');
        })
        $('#gpx-tab').click(function (e) {
            $('#home').addClass('active show')
            $('#home').load('{{ route('import_gpx') }}');
        })

        $('#profilpic').on('change', function (e) {
            var image = $('#profilpic')[0].files[0];
            var form = new FormData();
            form.append('image', image);
            e.preventDefault()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ url('/profile/edit') }}/{{ $userid }}' ,
                type: 'POST',
                data: form,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function () {
                }
            })
        })
        $('#courses-tab').click(function (e) {
            $('#home').addClass('active show')
            $.ajax({
                url: "/routes",
                dataType: 'html'
            })
                .done(function (data) {
                    $('#home').empty();
                    $('#home').append(data);
                    $('#home').append('<button id="loadNextRaces" class="btn btn-primary">Afficher les courses suivantes</button>')
                })
        })
        // Lazy loading des courses.
        $('body').on('click', '#loadNextRaces', function () {

            $.ajax({
                url: "/routes?page=" + pageToGet,
                dataType: 'html'
            })
                .done(function (data) {
                    $('body #loadNextRaces').before(data);
                })
            pageToGet++;
        })

    </script>
@endsection