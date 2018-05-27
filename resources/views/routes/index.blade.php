@foreach($racesDone as $race)
    <div class="accordion">
        <div class="card border-bottom mb-4" id="{{ $race->id }}">
            <div class="card-header" id="heading{{ $race->id }}" data-toggle="collapse"
                 data-target="#collapse{{ $race->id }}" aria-expanded="false"
                 aria-controls="collapse{{ $race->id }}">
                <h2>
                    {{ $race->name }}
                </h2>
            </div>
            <div id="collapse{{ $race->id }}" class="collapse collapsed"
                 aria-labelledby="heading{{ $race->id }}"
                 data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-8 map" style="width: 100%; height: 300px;" data-idrace="{{ $race->id }}">
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

<script>
    @foreach($racesDone as $race)
        $('#collapse{{ $race->id }}').on('shown.bs.collapse', function () {
            // Je stocke l'élement map dans une variable
            var map = $(this.children[0].children[0].children[0]);
            // Je rajoute un param a initMap
            function initMap(data) {
                var directionsService = new google.maps.DirectionsService;
                var directionsDisplay = new google.maps.DirectionsRenderer;
                //J'utilise le param ici pour faire référence à la map de la course cliquée
                var map = new google.maps.Map(data[0], {
                    zoom: 13
                });
                directionsDisplay.setMap(map);
                var waypts = [];

                @foreach(DB::table('waypoints')->where('gpx_id', DB::table('gpxs')->find($race->gpx_id)->id)->get() as $key => $waypoint)

                    var point{{ $key }} = new google.maps.LatLng(parseFloat({{$waypoint->lat}}), parseFloat({{$waypoint->lon}}));
                    waypts.push({
                        location: point{{ $key }},
                        stopover: false
                    });
                @endforeach

                var start = new google.maps.LatLng( parseFloat({{ DB::table('gpxs')->find($race->gpx_id)->startLat }}), parseFloat({{ DB::table('gpxs')->find($race->gpx_id)->startLon }}));
                var end = new google.maps.LatLng( parseFloat({{ DB::table('gpxs')->find($race->gpx_id)->endLat }}), parseFloat({{ DB::table('gpxs')->find($race->gpx_id)->endLon }}));
                directionsService.route({
                    origin: start,
                    destination:end,
                    waypoints: waypts,
                    optimizeWaypoints: true,
                    travelMode: 'WALKING'
                }, function(response, status) {
                    if (status === 'OK') {
                        directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
            }
            initMap(map)
        })
    @endforeach
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAEI9baRRJttdnPqZFJPSFI1syDpHmgVA&callback=initMap">
</script>