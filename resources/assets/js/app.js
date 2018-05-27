require('./bootstrap');

function createChart(chart) {
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
        chart.forEach((distance) => {
            chart.data.datasets[0].data
                .unshift(distance.distance_done);
        });
    }

    function updateChartLabels(chart) {
        chart.forEach((distance) => {
            chart.data.labels
                .unshift(distance.date_done);
        });

    }

    myChart.update();
    updateChartData(myChart);
    updateChartLabels(myChart);
    myChart.update();
}


