@extends('layouts.app')

@section('content')

    <div class="container pt-5 mt-5" >
        <div class="row align-items-center">
            <h2>Vos données GPX</h2>
            <p>L'export de vos données GPX vous permet de d'utiliser SpeedRunner et de vous mesurer à toute une communauté de coureurs</p>
            <p>Nous avons regroupé ici les plateformes les plus couramment utilisées, si vous ne parvenez pas à trouver vos données GPX nhésitez pas à nous contacter.</p>
            <div class="card-deck mt-5">
                <div class="card bouncy">
                    <img class="card-img-top" src="{{asset('images/nikeplus.jpg')}}" alt="logorun" height="285px">
                    <div class="card-body">
                        <h5 class="card-title">Nike+ Run Club</h5>
                        <p data-toggle="collapse" data-target="#show" class="export" aria-expanded="false">Exportez avec Nike+ Run Club</p>
                        <div id="show" class="collapse mb-3">
                            <p>L'application Nike+ Run Club ne permet pas d'obtenir vos données GPX directement. Pour se faire il faudra passe par une application tierce</p>
                            <p>L'équipe de SpeedRunner vous recommande SyncMyTracks, une application qui vous permet de télécharger vos données GPX à travers diverses plateforme.</p>
                        </div>
                    </div>
                </div>

                <div class="card bouncy">
                    <img class="card-img-top" src="{{asset('images/strava.jpg')}}" alt="logorun" height="285px">
                    <div class="card-body">
                        <h5 class="card-title">Strava</h5>
                        <p data-toggle="collapse" data-target="#show1" class="export" aria-expanded="false">Exportez avec Strava</p>
                        <div id="show1" class="collapse mb-3">
                            <p>L'application Strava vous donne la possibilité d'exporter votre trace GPX depuis n'importe laquelle de vos pages d'activités.
                            <p>A partir d'une de vos pages d'activité sur le menu, cliquez sur "Exporter GPX".</p>
                            <p>Un fichier avec l'extension .gpx sera téléchargé sur votre ordinateur</p>
                            <p>Il vous suffit par la suite de vous connecter sur SpeedRunner et d'ajouter votre fichier dans l'onglet "Import de vos données GPX"</p>
                        </div>
                    </div>
                </div>

                <div class="card bouncy">
                    <img class="card-img-top" src="{{asset('images/runtastic.png')}}" alt="logorun" height="285px">
                    <div class="card-body">
                        <h5 class="card-title">Runtastic</h5>
                        <p data-toggle="collapse" data-target="#show2" class="export" aria-expanded="false" >Exportez avec Runtastic</p>
                        <div id="show2" class="collapse mb-3">
                            <p>Selectionnez "Activités" dans votre menu.</p>
                            <p>Cliquez sur l'activité que vous souhaitez télécharger.</p>
                            <p>Il vous faut par la suite choisir le format GPX et le téléchargement commencera automatiquement lorsque vous aurez choisi le fichier.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center mt-5">
            <div class="card-deck mt-5">
                <div class="card bouncy">
                    <img class="card-img-top" src="{{asset('images/runkeeper.jpg')}}" alt="logorun" height="285px">
                    <div class="card-body">
                        <h5 class="card-title">Runkeeper</h5>
                        <p data-toggle="collapse" data-target="#show4" class="export" aria-expanded="false">Exportez avec Runkeeper</p>
                        <div id="show4" class="collapse mb-3">
                                <p>Rendez-vous sur la page <p class="export">runkeeper.com/settings</p>
                                <p>Vous trouverez en bas de cette page un onglet permettant d'exporter vos données</p>
                                <p>Choississez une date de début et une date de fin en utilisant le calendrier prévu a cet effet</p>
                                <p>Vous pouvez maintenant télécharger votre fichier GPX</p>
                        </div>
                    </div>
                </div>

                <div class="card bouncy">
                    <img class="card-img-top" src="{{asset('images/garmin.png')}}" alt="logorun" height="285px">
                    <div class="card-body">
                        <h5 class="card-title">Garmin</h5>
                        <p data-toggle="collapse" data-target="#show5" class="export" aria-expanded="false">Exportez avec Garmin</p>
                        <div id="show5" class="collapse mb-3">
                            <p>Connectez-vous à Garmin Account</p>
                            <p>Dans la barre de gauche selectionnez "Activités" et choississez une course</p>
                            <p>Cliquez sur l'icône engrenage pour avoir accès aux paramètres d'exportation et choissisez le format GPX</p>
                        </div>
                    </div>
                </div>

                <div class="card bouncy">
                    <img class="card-img-top" src="{{asset('images/polar.png')}}" alt="logorun" height="285px">
                    <div class="card-body">
                        <h5 class="card-title">Polar</h5>
                        <p data-toggle="collapse" data-target="#show6" class="export" aria-expanded="false">Exportez avec Polar</p>
                        <div id="show6" class="collapse mb-3">
                            <p>Connectez-vous au service Web Polar Flow.</p>
                            <p>Rendez-vous sur la partie "Agenda" et cliquez sur une séance d'entrainement pour l'ouvrir</p>
                            <p>Vous pouvez maintenant choisir le format de fichier que vous voulez exporter.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection