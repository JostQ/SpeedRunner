@extends('layouts.app')

@section('content')

    <div class="container mt-5 pt-5" id="statistics">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 border-right p-4">
                <h2>Kilomètres/Jour</h2>
                <canvas id="kmPerDay" width="400" height="400"></canvas>
            </div>
            <div class="col-lg-4 col-md-6 col-12 border-right p-4">
                <h2>Vitesse moyenne</h2>
                <span class="display-3">7km/h</span>
            </div>
            <div class="col-lg-4 col-md-6 col-12 p-4 flex">
                <h2>Kilomètres parcourus</h2>
                <span class="display-3">82km</span>
            </div>
        </div>

@endsection

        @section('page-specific-scripts')
            <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
            <script>
                var ctx = document.getElementById("kmPerDay").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"],
                        datasets: [{
                            label: 'Kilomètre par Jour',
                            data: [8,3,5,6,7,8, 6.5],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script>

@endsection