@foreach($racesDone as $race)
    <div class="accordion">
        <div class="card mb-3 border-bottom" id="{{ $race->id }}">
            <div class="card-header" id="heading{{ $race->id }}">
                <h2 data-toggle="collapse"
                    data-target="#collapse{{ $race->id }}" aria-expanded="false"
                    aria-controls="collapse{{ $race->id }}">
                    {{ $race->name }}
                </h2>
            </div>
            <div id="collapse{{ $race->id }}" class="collapse collapsed"
                 aria-labelledby="heading{{ $race->id }}"
                 data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-8 map" data-idrace="{{ $race->id }}">
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <h3>Statistiques de la course</h3>
                            <p>Date : {{ $race->date_done }}</p>
                            <p>Temps : {{ ($race->time) }} h</p>
                            <p>Distance parcourue : {{ $race->distance_done }}
                                Km</p>
                            <p>Vitesse moyenne : {{ $race->speed }} Km/h</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
