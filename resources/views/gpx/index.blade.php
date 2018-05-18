{{--@extends('layouts.app')--}}

{{--@section('content')--}}

    <div class="container mt-5 pt-5" id="importGpx">
        <div class="row justify-content-center">
            <h2>Importez vos données GPX</h2>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 col-md-12 offset-lg-3">
                <form action="{{ route('add_gpx') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="gpxFile">
                        </div>
                        <div class="form-group">
                            <label for="">Nom de la course</label>
                            <input id="raceName" type="text" class="form-control" name="raceName" value="Course {{ $numberOfRacesDone + 1 }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary d-block" type="submit">C'est parti !</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    {{--function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];

            <?php foreach ($waypoints as $key => $waypoint): ?>
        var point<?= $key ?> = new google.maps.LatLng(<?= $waypoint['lat'] ?>, <?= $waypoint['lon'] ?>);
        waypts.push({
            location: point<?= $key ?>,
            stopover: false
        });
            <?php endforeach; ?>

        var start = new google.maps.LatLng( <?= $start['lat'] ?>, <?= $start['lon'] ?>);
        var end = new google.maps.LatLng( <?= $end['lat'] ?>, <?= $end['lon'] ?>);
        directionsService.route({
            origin: start,
            destination:end,
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: 'WALKING'
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
                var route = response.routes[0];
                var summaryPanel = document.getElementById('directions-panel');
                summaryPanel.innerHTML += route.legs[0].distance.text

            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });--}}
</script>
{{--@endsection--}}