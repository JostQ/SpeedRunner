@extends('layouts.app')

@section('page-specific-scripts')

@endsection

@section('content')

    <div class="jumbotron-fluid pt-5 mt-5" id="slider">
        <img class="position-fixed img-fluid" style="z-index: -999" src="{{asset('images/3.jpg')}}" alt="">
        <div class="container py-4">
            <h2 class="h2 text-light">Du running, mais pas que</h2>
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
                            Comparer votre performance au reste de la communauté. Vous courez non seulement pour le plaisir mais vous pouvez débloquer des avantages exclusifs avec nos partenaires.
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-center pb-4">

                    <div class="card bouncy">
                        <img class="p-5" src="{{asset('icons/medal.svg')}}" alt="">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto assumenda at aut blanditiis consectetur eos fuga in, maxime minima minus natus neque quis quo recusandae rem, rerum saepe sed tempora?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

