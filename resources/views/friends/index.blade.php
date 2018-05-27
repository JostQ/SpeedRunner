@extends('layouts.app')

@section('content')
    <?php $friendship = \App\Model\Friendship::where('users_id', \Illuminate\Support\Facades\Auth::user()->id)->where('friend_id', $userid)->get(); ?>
    <div class="container mt-5 mb-5 pt-5" id="profile">
        <div class="row align-items-center">
            <div class="col-sm-2 col-lg-2 text-center">
                <!-- Photo de profil de l'ami-->
                @if(isset($profile_pic))
                    <img src="{{asset('images') . '/' . $profile_pic}}"
                         alt="listrunner"
                         class="rounded-circle img-thumbnail m-2"
                         id="imgprofil">
                @else
                    <img src="{{asset('images/girlrun4.jpg')}}"
                         alt="listrunner"
                         class="rounded-circle img-thumbnail m-2"
                         id="imgprofil">
                @endif
                <form method="post" id="addfriend" class="d-inline">
                    @csrf
                    <input type="hidden" name="friends_id" value="{{ $userid }}">

                    @if (isset($friendship[0]->id))
                        <div class="d-inline speedrun-primary"><i class="mr-2 fas fa-check"></i>Amis</div>
                </form>
                <form method="post" id="removeFriend" class="d-inline">
                    @csrf
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                </form>

                @else
                    <button class="btn btn-primary" type="submit">Devenir amis</button>
                    </form>
                @endif

            </div>

            <!--Info coureurs-->
            <div class="col-sm-6 mt-2 col-lg-6" id="infos">
                <div class="mb-2">
                    <h4> {{ $user }}</h4>
                </div>
                <p><i class="fas fa-user-friends"></i> Nombres d'amis : {{ count($friends) }}</p>
                <p><i class="fas fa-chart-line"></i> Niveau : {{ $level }}</p>
                <p><i class="fas fa-list"></i> {{ $league }}</p>
                <p><i class="far fa-thumbs-up"></i> Nombre de courses effectuées : {{ $all_races }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row mt-5 pt-2" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="actualite-tab"
                           data-toggle="tab"
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
                        <a class="nav-link" id="classement-tab"
                           data-toggle="tab"
                           href="#classement" role="tab"
                           aria-controls="classement"
                           aria-selected="false">Classement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="courses-tab" data-toggle="tab"
                           href="#courses" role="tab"
                           aria-controls="classement" aria-selected="false">Listes
                            des
                            courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="courses-tab" data-toggle="tab"
                           href="#amis" role="tab"
                           aria-controls="amis" aria-selected="false">Amis</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade " id="home" role="tabpanel"
                         aria-labelledby="home-tab">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="resultFriend"></div>
@endsection

@section('page-specific-scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">

    </script>
    <script>
        let pageToGet = 2;
        let actuToGet = 2;
        let main = $('#home'); // Ahhh, si seulement j'avais déclaré cette variable plus tôt ...

        /////////////////////////////////////////
        ///
        ///          LOAD ACTU INDEX
        ///
        /////////////////////////////////////////

        $.ajax({
            url: '{{url('actu')}}/' + '{{$userid}}',
            data: 'html',
        })
            .done(function (data) {
                main.addClass('active show')
                main.empty()
                @if($actus === 0)
                main.append('<div class="alert alert-primary">C\'est assez vide par ici ...</div>');
                @endif
                main.append(data)
                @if( $actus > 10)
                $('#nav-tabContent').append('<button id="loadNextActualities" class="btn btn-primary mt-3">Actualités suivantes</button>')
                @endif
            });

        /////////////////////////////////////////
        ///
        ///           TAB ACTUALITE
        ///
        /////////////////////////////////////////

        $('#actualite-tab').click(function (e) {
            $.ajax({
                url: '{{url('actu')}}/' + '{{$userid}}',
                data: 'html',
            })
                .done(function (data) {
                    main.addClass('active show')
                    main.empty()
                    @if($actus === 0)
                    main.append('<div class="alert alert-primary">C\'est assez vide par ici ...</div>');
                    @endif
                    main.append(data)
                    @if( $actus > 10)
                    $('#nav-tabContent').append('<button id="loadNextActualities" class="btn btn-primary mt-3">Actualités suivantes</button>')
                    @endif
                });
        });

        /////////////////////////////////////////
        ///
        ///           TAB STATISTIQUES
        ///
        /////////////////////////////////////////

        $('#stats-tab').click(function (e) {
            main.addClass('active show')
            $.ajax({
                url: '{{route('statistics')}}/{{$userid}}',
                data: 'html',
            })
                .done(function (data, response) {
                    if (response === 'success') {
                        main.empty();
                        main.append(data);
                    } else {
                        main.prepend('<div class="alert alert-danger">Il semblerait qu\'il y ait eu une erreur dans notre machinerie ...</div')
                    }
                })
        });

        /////////////////////////////////////////
        ///
        ///          TAB CLASSEMENTS
        ///
        /////////////////////////////////////////

        $('#classement-tab').click(function (e) {
            main.addClass('active show')
            $.ajax({
                url: '{{url('leaderboards')}}/{{$userid}}',
                data: 'html',
            })
                .done(function (data) {
                    main.empty().append(data)
                });
        });

        /////////////////////////////////////////
        ///
        ///           TAB SUCCES
        ///
        /////////////////////////////////////////

        $('#success-tab').click(function (e) {
            $.ajax({
                url: '{{url('succes/')}}/{{$userid}}',
                data: 'html',
            })
                .done(function (data) {
                    main.empty()
                    @if($success === 0)
                    main.append('<div class="alert alert-primary">C\'est assez vide par ici ...</div>');
                    @endif
                    main.append(data);
                })
        });

        /////////////////////////////////////////
        ///
        ///           LISTE DES COURSES
        ///
        /////////////////////////////////////////

        $('#courses-tab').click(function (e) {
            main.addClass('active show')
            $.ajax({
                url: "/routes/{{ $userid }}",
                dataType: 'html'
            })
                .done(function (data) {
                    main.empty();
                    @if($all_races === 0)
                    main.append('<div class="alert alert-primary">C\'est assez vide par ici ...</div>');
                    @endif
                    main.append(data);
                    @if ($all_races > 5)
                    main.append('<button id="loadNextRaces" class="btn btn-primary">Afficher les courses suivantes</button>')
                    @endif

                })
        })

        /////////////////////////////////////////
        ///
        ///           LAZY LOADING COURSES
        ///
        /////////////////////////////////////////

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

        /////////////////////////////////////////
        ///
        ///           AJOUT D'AMI
        ///
        /////////////////////////////////////////

        $('#addfriend').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                dataType: 'json',
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (data.status === 'OK') {
                        $('#resultFriend').empty();
                        $('#resultFriend').append($('<div>', {class: 'alert alert-success'}).html(data.success))
                    }
                    else {
                        $('#resultFriend').empty();
                        $('#resultFriend').append($('<div>', {class: 'alert alert-danger'}).html(data.errors))
                    }
                }
            })
        })

        /////////////////////////////////////////
        ///
        ///          SUPPRESION D'AMI
        ///
        /////////////////////////////////////////

        $('#removeFriend').on('click', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url('/friends/'.$userid)}}',
                dataType: 'json',
                type: 'POST',
                data: {friends_id: '{{ $userid }}'},
                success: function (data) {
                    if (data.status === 'OK') {
                        $('#resultFriend').empty();
                        $('#resultFriend').append($('<div>', {class: 'alert alert-success'}).html(data.success))
                    }
                    else {
                        $('#resultFriend').empty();
                        $('#resultFriend').append($('<div>', {class: 'alert alert-danger'}).html(data.errors))
                    }
                }
            })
        })
    </script>
@endsection