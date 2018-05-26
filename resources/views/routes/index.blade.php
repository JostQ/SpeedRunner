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
                        <div class="col-md-12 col-lg-8 map" style="width: 500px; height: 500px;"
                             data-idrace="{{ $race->id }}">
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


    // $('.collapse').on('hidden.bs.collapse', function (event) {
    //     function initMap() {
    //         var directionsService = new google.maps.DirectionsService;
    //         var directionsDisplay = new google.maps.DirectionsRenderer;
    //         var map = new google.maps.Map(event, {
    //             zoom: 13,
    //             center: {lat: 44.803467, lng: -0.614424}
    //         });
    //         directionsDisplay.setMap(map);
    //     }
    //     $.ajax({
    //         url: 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB9u87B_PSlDMwKubnjUTRJJqpM33Jihhw&callback=initMap',
    //         dataType: 'script'
    //     })
    //         .done(()=>initMap())
    // })

    $('.collapse').on('shown.bs.collapse', function () {
        var map = $(this.children[0].children[0].children[0]);
        function initMap(data) {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var map = new google.maps.Map(data[0], {
                zoom: 13,
                center: {lat: 44.803467, lng: -0.614424}
            });
            directionsDisplay.setMap(map);
        }
        initMap(map)
    })
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9u87B_PSlDMwKubnjUTRJJqpM33Jihhw">
</script>