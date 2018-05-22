@extends('layouts.app')

@section('content')

    <div class="container pt-5 mt-5" >
        <div class="row align-items-center">
            <h2>Vos données GPX</h2>
            <div class="card-deck mt-5">
                <div class="card bouncy">
                    <img class="card-img-top" src="{{asset('images/nikeplus.jpg')}}" alt="Card image cap" height="285px">
                    <div class="card-body">
                        <h5 class="card-title">Nike+ Run Club</h5>

                        <p data-toggle="collapse" data-target="#show"><a href="#">Exportez vos données avec Nike+ Run Club</a></p>
                        <div id="show" class="collapse mb-3">
                            <ul class="list-group-flush">
                                <li class="list-group-item">
                                    Tout d'abord connectez-vous à votre compte Nike+




                                    <!--finir ce putain de tuto nike+mabite -->
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="card bouncy">
                    <img class="card-img-top" src="{{asset('images/strava.jpg')}}" alt="Card image cap" height="285px">
                    <div class="card-body">
                        <h5 class="card-title">Strava</h5>
                        <p>L'application Strava vous donne la possibilité d'exporter votre trace GPX depuis n'importe laquelle de vos pages d'activités.
                        <p>A partir d'une de vos pages d'activité sur le menu, cliquez sur "Exporter GPX".</p>
                        <p>Un fichier avec l'extension .gpx sera téléchargé sur votre ordinateur</p>
                        <p>Il vous suffit par la suite de vous connecter sur SpeedRunner et d'ajouter votre fichier dans l'onglet "Import de vos données GPX"</p>

                    </div>
                </div>
                <div class="card bouncy">
                    <img class="card-img-top" src="{{asset('images/runtastic.png')}}" alt="Card image cap" height="285px">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection