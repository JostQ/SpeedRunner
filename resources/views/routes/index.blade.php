@extends('layouts.app')

@section('content')

    <div class="container mt-5 pt-5" id="racesList">
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordion">
                    @foreach($racesDone as $race)
                        <div class="card" id="{{ $race->id }}">
                            <div class="card-header" id="heading{{ $race->id }}">
                                <h2 data-toggle="collapse" data-target="#collapse{{ $race->id }}" aria-expanded="false" aria-controls="collapse{{ $race->id }}">
                                    {{ $race->name }}
                                </h2>
                            </div>
                            <div id="collapse{{ $race->id }}" class="collapse collapsed" aria-labelledby="heading{{ $race->id }}" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-8">
                                            MAP
                                        </div>
                                        <div class="col-md-12 col-lg-4">
                                            <h3>Statistiques de la course</h3>
                                            <p>Date : {{ $race->date_done }}</p>
                                            <p>Temps : {{ $race->time }}</p>
                                            <p>Distance parcourue : {{ $race->distance_done }} Km</p>
                                            <p>Vitesse moyenne : {{ $race->speed }} Km/h</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection