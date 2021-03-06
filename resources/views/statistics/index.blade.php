<div class="row mt-3">
    <div class="col-lg-4 col-md-6 col-12 mb-3">
        <div class="card">
            <div class="card-header"><h2>Kilomètres / Jour</h2></div>
            <div class="card-body">
                <canvas id="kmPerDay" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12 mb-3">
        <div class="card">
            <div class="card-header">
                <h2>Vitesse moyenne&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
            </div>
            <div class="card-body">
                <span class="display-4">{{ round($stats->average_speed, 2) }}
                    km/h</span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12 flex mb-3">
        <div class="card">
            <div class="card-header"><h2>Kilomètres parcourus</h2></div>
            <div class="card-body"><span
                        class="display-4">{{ round($stats->total_distance, 2) }}
                    Km</span>
            </div>
        </div>


    </div>
</div>

<script src="{{ asset('js/Chart.bundle.min.js') }}" defer></script>
<script defer>
    function createChart(data) {
        var ctx = document.getElementById("kmPerDay").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Kilomètres par Jour',
                        data: [],
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
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        function updateChartData(chart) {
            data.forEach((distance) => {
                chart.data.datasets[0].data
                    .unshift(distance.distance_done);
            });
        }

        function updateChartLabels(chart) {
            data.forEach((distance) => {
                chart.data.labels
                    .unshift(distance.date_done);
            });

        }

        myChart.update();
        updateChartData(myChart);
        updateChartLabels(myChart);
        myChart.update();
    }
</script>
<script defer>
    createChart({!!  $kmPerDay !!});
</script>