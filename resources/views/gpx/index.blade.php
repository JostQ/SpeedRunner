<div class="row justify-content-center mt-3">
    <h2>Importez vos données GPX</h2>
</div>
<div class="row mt-5">
    <div class="col-lg-6 col-md-12 offset-lg-3">
        <form action="{{ route('add_gpx') }}" method="post"
              enctype="multipart/form-data" id="submitGpx">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <input type="file" class="form-control-file"
                           name="gpxFile">
                </div>
                <div class="form-group">
                    <label for="">Nom de la course</label>
                    <input id="raceName" type="text" class="form-control"
                           name="raceName"
                           value="Course {{ $numberOfRacesDone + 1 }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary d-block" type="submit">
                        C'est parti !
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;

        $('#submitGpx').on('submit', function (event) {
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status === 'ok') {

                        var waypts = [];
                        var waytime = 0;

                        $(data.waypoints).each(function (index, waypoint) {
                            index = new google.maps.LatLng(waypoint.lat, waypoint.lon);
                            waypts.push({
                                location: index,
                                stopover: false
                            });
                            waytime = waypoint.time - waytime;
                        });

                        console.log(waypts);
                        var start = new google.maps.LatLng(data.start.lat, data.start.lon);
                        var end = new google.maps.LatLng(data.end.lat, data.end.lon);
                        directionsService.route({
                            origin: start,
                            destination: end,
                            waypoints: waypts,
                            optimizeWaypoints: true,
                            travelMode: 'WALKING'
                        }, function (response, status) {
                            if (response.status === 'OK') {
                                directionsDisplay.setDirections(response);

                                var route = response.routes[0];
                                console.log(route);
                                var distance = (route.legs[0].distance.value) / 1000;
                                var timeStart = parseInt(data.start.time);
                                var timeEnd = parseInt(data.end.time);
                                var time = ((timeEnd - waytime) + (waytime - timeStart)) / 60;

                                time = Math.round(time * 100) / 100;

                                var vitesse = (distance) / (time * (1 / 60));
                                vitesse = Math.round(vitesse * 100) / 100;

                                $.ajax({
                                    url: '{{ route('add_race_gpx') }}',
                                    type: 'POST',
                                    data: {
                                        'distance_done': distance,
                                        'time': time,
                                        'speed': vitesse,
                                        'date_done': data.date,
                                        'name': $('#raceName').val()
                                    },
                                    dataType: 'json',
                                    success: function (data) {
                                        console.log('bouh')
                                        console.log(data)
                                    }
                                })


                            } else {
                                window.alert('Directions request failed due to ' + status);
                            }
                        });
                    }
                }
            })
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0kAgeh9vgP7n8VUjo49LqK3I350pXnVs&callback=initMap">
</script>