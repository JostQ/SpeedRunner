@extends('layouts.app')

@section('page-specific-scripts')

@endsection

@section('content')

    <div class="jumbotron-fluid mt-5" id="slider">
        <img class="position-fixed img-fluid" style="z-index: -999" src="{{asset('images/3.jpg')}}" alt="">
        <div class="container py-5">
            <h1 class="speedrun-hero">Bien plus que du running.</h1>
            <div class="row py-4">
                <div class="col-lg-4 col-md-6 col-12 text-center pb-4">
                    <div class="card bouncy">
                        <img class="p-5" src="{{asset('icons/jogging.svg')}}" alt="">
                        <div class="card-body">
                            Obtenez bien plus  qu'un suivi d'activité. Sur SpeedRunner retrouvez vos statistiques de courses, vos tracés et partagez vos performances avec vos amis.
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-center pb-4">

                    <div class="card bouncy">
                        <img class="p-5" src="{{asset('icons/podium.svg')}}" alt="">
                        <div class="card-body">
                            Comparez vos performances au reste de la communauté, et visez toujours plus haut.
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-center pb-4">

                    <div class="card bouncy">
                        <img class="p-5" src="{{asset('icons/medal.svg')}}" alt="">
                        <div class="card-body">
                            Vous vous êtes fixé un objectif ? Courir n'a jamais été aussi plaisant qu'avec SpeedRunner et notre système de succès qui récompense une activité régulière.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

