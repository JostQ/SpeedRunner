@extends('layouts.app')

@section('content')

    <div class="container mt-5" id="profile">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <img src="https://1.bp.blogspot.com/-TWLe47tl4gE/V-jRzhvNs7I/AAAAAAAAB1A/YRyA08g7vYM3V4RO2lQX9CM-pDJ6NRvkgCLcB/s1600/IMG_6090_opt.jpg"
                     alt="runneuse"
                     class="rounded-circle mt-5 mb-4"
                     id="picprofil">

            </div>
            <div class="col-sm-4">
                <div><h4>{{--pseudo--}} pseudo du runner à récup</h4></div>
                <div>
                    <p>nombres d'amis :</p> {{----}}
                </div>
                <div>
                    <p>nombres de points :</p> {{----}}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mt-5">Coureur de même niveau</div>
                <div class="list">
                    <div class="row mt-2" id="runner">
                        <div class="col proff">
                            <img src="{{asset('images/girlrun2.jpg')}}" alt="listrunner" class="listrun rounded-circle"
                                 height="40em">alex{{----}}
                            <a href="#"><img src="{{asset('images/runneradd.png')}}" alt="runner-add"
                                             id="runner-add"></a>
                        </div>
                        <div class="w-100"></div>
                        <div class="col proff mt-2">
                            <img src="{{asset('images/girlrun2.jpg')}}" alt="listrunner" class="listrun rounded-circle"
                                 height="40em">dimitri
                            <a href="#"><img src="{{asset('images/runneradd.png')}}" alt="runner-add"
                                             id="runner-add"></a>
                        </div>
                        <div class="w-100 mt-2"></div>
                        <div class="col proff mt-2">
                            <img src="{{asset('images/girlrun2.jpg')}}" alt="listrunner" class="listrun rounded-circle"
                                 height="40em">
                            <a href="#"><img src="{{asset('images/runneradd.png')}}" alt="runner-add"
                                             id="runner-add"></a>
                        </div>
                        <div class="w-100 mt-2"></div>
                        <div class="col proff mt-2">
                            <img src="{{asset('images/girlrun2.jpg')}}" alt="listrunner" class="listrun rounded-circle"
                                 height="40em">
                            <a href="#"><img src="{{asset('images/runneradd.png')}}" alt="runner-add"
                                             id="runner-add"></a>
                        </div>
                        <div class="w-100 mt-2"></div>
                        <div class="col proffmt-2">
                            <img src="{{asset('images/girlrun2.jpg')}}" alt="listrunner" class="listrun rounded-circle"
                                 height="40em">
                            <a href="#"><img src="{{asset('images/runneradd.png')}}" alt="runner-add"
                                             id="runner-add"></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="actualite-tab" data-toggle="tab" href="#actualite" role="tab"
                   aria-controls="actualite" aria-selected="true">Fil d'actualité</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="defi-tab" data-toggle="tab" href="#defi" role="tab" aria-controls="profile"
                   aria-selected="false">Défis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
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
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>

    </div>
@endsection