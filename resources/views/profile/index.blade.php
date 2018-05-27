@extends('layouts.app')

@section('content')
    <div class="container mt-2 mb-5 pt-5" id="profile">
        <div class="row align-items-center">
            <div class="col-sm-2 col-lg-2 text-center">

                <!-- Photo de profil -->
                @if(isset($profile_pic))
                    <img src="{{asset('avatars') . '/' . $profile_pic}}"
                         alt="listrunner"
                         class="rounded-circle img-thumbnail m-2"
                         id="imgprofil">
                @else
                    <img src="{{asset('images/girlrun4.jpg')}}"
                         alt="listrunner"
                         class="rounded-circle img-thumbnail m-2"
                         id="imgprofil">
                @endif
                <form method="post" id="CHAGASSE" enctype="multipart/form-data">
                    @csrf
                    <input type="file" required id="profilpic" class="image"
                           name="profilpic"/>
                    <label for="profilpic"
                           class="fileContainer btn btn-outline-primary">
                        <i class="mr-2 fas fa-camera"></i>Modifier
                    </label>
                </form>
            </div>

            <!--Info coureurs-->
            <div class="col-sm-6 mt-2 col-lg-6" id="infos">
                <div class="mb-2">
                    <h4> {{ $user }}</h4>
                </div>

                <p><i class="fas fa-user-friends"></i> Nombres d'amis : <span id="friends">{{ $friend }}</span></p>
                <p><i class="fas fa-chart-line"></i> Niveau : <span id="level">{{ $level }}</span></p>
                <p><i class="fas fa-list"></i> <span id="league">{{ $league }}</span></p>
                <p><i class="far fa-thumbs-up"></i> Nombre de courses effectuées : <span
                            id="races">{{ $all_races }}</span></p>

            </div>

            <!--affichage ou non de la liste d'amis-->
            @if(empty ($list_league))
                <div class="col-12 col-lg-4">
                    <h5>Vous n'avez pas encore d'amis</h5>
                </div>
            @else
                <div class="col-12 col-lg-4" id="runfriend">
                    <div class="mt-5">Ils ont le même niveau que vous</div>
                    <div class="list">
                        <ul class="list-group">
                            <!--Liste de coureurs même niveau-->

                            @foreach($list_league as $item)
                                <a href="{{ asset('profile' . '/' . $item->users_id) }}">
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                                        {{ $item->firstname }} {{ $item->lastname }}
                                        @if(isset($item->picture))
                                            <img src="{{asset('images') . '/' . $item->picture}}"
                                                 alt="listrunner"
                                                 class="rounded-circle img-thumbnail mx-2 imgprofil">
                                        @else
                                            <img src="{{asset('images/girlrun4.jpg')}}"
                                                 alt="listrunner"
                                                 class="rounded-circle img-thumbnail mx-2 imgprofil">
                                        @endif
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
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
                        <a class="nav-link" id="gpx-tab" data-toggle="tab"
                           href="#gpx"
                           role="tab" aria-controls="gpx"
                           aria-selected="false">Import de vos données GPX</a>
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
                        <a class="nav-link" id="amis-tab" data-toggle="tab"
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
    {{--La fenêtre modale--}}
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog"
         aria-labelledby="ModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Publication
                        <i class="far fa-edit"></i></h5>

                    <button type="submit" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" name="statut"
                      enctype="multipart/form-data"
                      action="{{route('actu_post')}}">
                    @csrf
                    <div class="modal-body">
                        <label for="custom-file-input" id="custom"
                               class="btn btn-outline-primary ml-1">Image<i
                                    class="far fa-images ml-1"></i></label>
                        <textarea class="form-control"
                                  id="message-text"
                                  placeholder="Exprimez-vous..."
                                  name="message"
                                  required></textarea>
                        <input type="file" name="picture"
                               id="custom-file-input" class="join-file">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary">
                            Publier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="resultImgChange"></div>

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
            url: '{{route('actu')}}',
            data: 'html',
        })
            .done(function (data, response) {
                if (response === 'success') {
                    main.addClass('active show');
                    main.empty();
                    @if($actus === 0)
                    main.append('<div class="alert alert-primary">C\'est assez vide par ici ...</div>');
                    @endif
                    main.append(data);
                    @if( $actus > 10)
                    $('#nav-tabContent').append('<button id="loadNextActualities" class="btn btn-outline-primary mt-3">Actualités suivantes</button>')
                    @endif
                } else {
                    main.prepend('<div class="alert alert-danger">Il semblerait qu\'il y ait eu une erreur dans notre machinerie ...</div')
                }
            });

        /////////////////////////////////////////
        ///
        ///           TAB ACTUALITE
        ///
        /////////////////////////////////////////

        $('#actualite-tab').click(function (e) {
            main.addClass('active show')
            $.ajax({
                url: '{{route('actu')}}',
                data: 'html',
            })
                .done(function (data, response) {
                    if (response === 'success') {
                        main.empty();
                        @if($actus === 0)
                        main.append('<div class="alert alert-primary">C\'est assez vide par ici ...</div>');
                        @endif
                        main.append(data);
                        @if( $actus > 10)
                        $('#nav-tabContent').append('<button id="loadNextActualities" class="btn btn-outline-primary mt-3">Actualités suivantes</button>')
                        @endif
                    } else {
                        main.prepend('<div class="alert alert-danger">Il semblerait qu\'il y ait eu une erreur dans notre machinerie ...</div')
                    }
                })
        });


        /////////////////////////////////////////
        ///
        ///           TAB STATISTIQUES
        ///
        /////////////////////////////////////////

        $('#stats-tab').click(function (e) {
            main.addClass('active show')
            $.ajax({
                url: '{{route('statistics')}}',
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
        ///           IMPORT GPX
        ///
        /////////////////////////////////////////

        $('#gpx-tab').click(function (e) {
            main.addClass('active show')
            $.ajax({
                url: '{{route('import_gpx')}}',
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
                url: '{{route('leaderboards')}}',
                data: 'html',
            })
                .done(function (data, response) {
                    if (response === 'success') {
                        main.addClass('active show');
                        main.empty();
                        main.append(data);
                    } else {
                        main.prepend('<div class="alert alert-danger">Il semblerait qu\'il y ait eu une erreur dans notre machinerie ...</div')
                    }
                })
        });


        /////////////////////////////////////////
        ///
        ///           TAB SUCCES
        ///
        /////////////////////////////////////////

        $('#success-tab').click(function (e) {
            $.ajax({
                url: '{{route('success')}}',
                data: 'html',
            })
                .done(function (data, response) {
                    if (response === 'success') {
                        main.addClass('active show');
                        main.empty();
                        @if($success === 0)
                        main.append('<div class="alert alert-primary">C\'est assez vide par ici ...</div>');
                        @endif
                        main.append(data);
                    } else {
                        main.prepend('<div class="alert alert-danger">Il semblerait qu\'il y ait eu une erreur dans notre machinerie ...</div')
                    }
                })
        });

        /////////////////////////////////////////
        ///
        ///     AJAX DE LA PHOTO DE PROFIL
        ///
        /////////////////////////////////////////

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
            // Affichage photo de profil
            $.ajax({
                url: '{{ url('/profile/edit') }}/{{ $userid }}',
                type: 'POST',
                data: form,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data,) {
                    $('#imgprofil').attr('src', '{{asset('avatars')}}/' + data.picture);
                    if (Object.values($('.actuPic')).length > 2 && $('div[data-id]').data().id === {{\Illuminate\Support\Facades\Auth::user()->id}}) {
                        $('div[data-id={{\Illuminate\Support\Facades\Auth::user()->id}}] .actuPic').attr('src', '{{asset('avatars')}}/' + data.picture)
                    }
                },
                error: function (errors) {
                    errors.responseJSON.errors.image.forEach(function (error) {
                        $('#resultImgChange').append('<div class="alert alert-danger">' + error + '</div>');
                        setTimeout(function () {
                            $('#resultImgChange').hide(400)
                        }, 5000);
                    })
                }
            })
        })

        /////////////////////////////////////////
        ///
        ///           LISTE DES COURSES
        ///
        /////////////////////////////////////////

        $('#courses-tab').click(function (e) {
            main.addClass('active show')
            $.ajax({
                url: "/routes",
                dataType: 'html'
            })
                .done(function (data) {
                    main.empty();
                    @if($all_races === 0)
                    main.append('<div class="alert alert-primary">C\'est assez vide par ici ...</div>');
                    @endif
                    main.append(data);
                    @if ($all_races > 5)
                    main.append('<button id="loadNextRaces" class="btn btn-outline-primary">Afficher les courses suivantes</button>')
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
        ///           LAZY LOADING ACTU
        ///
        /////////////////////////////////////////

        $('body').on('click', '#loadNextActualities', function () {

            $.ajax({
                url: "/actu?page=" + actuToGet,
                dataType: 'html'
            })
                .done(function (data) {
                    data = $(data).find('#nav-home');
                    $('body #loadNextActualities').before(data);
                })
            actuToGet++;
        })

        /////////////////////////////////////////
        ///
        ///           TAB AMIS
        ///
        /////////////////////////////////////////

        $('#amis-tab').click(function (e) {
            $.ajax({
                url: '{{ url('friends_list') }}',
                dataType: 'html',
            })
                .done(function (data, response) {
                    if (response === 'success') {
                        main.addClass('active show');
                        main.empty();
                        @if($friend === 0)
                        main.append('<div class="alert alert-primary">C\'est assez vide par ici ...</div>');
                        @endif
                        main.append(data);
                    } else {
                        main.prepend('<div class="alert alert-danger">Il semblerait qu\'il y ait eu une erreur dans notre machinerie ...</div')
                    }
                })

        })
    </script>
@endsection