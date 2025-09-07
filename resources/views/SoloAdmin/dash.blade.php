@extends('layouts.admin')
@section('content')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Utilisateurs Aujourd'hui</p>
                            <h4 class="mb-0">{{ $todaysUsersCount }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span
                                class="text-success text-sm font-weight-bolder">{{ sprintf('%.2f', $usersChange) }}%
                            </span>par rapport à la semaine dernière</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Nombre d'Opérations</p>
                            <h4 class="mb-0">{{ $countDevis + $countBonDeCommande }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span
                                class="text-success text-sm font-weight-bolder">{{ sprintf('%.2f', ($devisChange + $bonDeCommandeChange) / 2) }}%
                            </span>par rapport à la semaine dernière</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Nombre de Fournisseur</p>
                            <h4 class="mb-0">{{ $countFournisseur }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span
                                class="text-success text-sm font-weight-bolder">{{ sprintf('%.2f', $fournisseurChange) }}%</span>
                            par rapport à la semaine dernière</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Nombre de Client</p>
                            <h4 class="mb-0">{{ $countClient }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span
                                class="text-danger text-sm font-weight-bolder">{{ sprintf('%.2f', $clientChange) }}%
                            </span>par rapport à la semaine dernière</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
                <div class="card z-index-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0">Répartition des opérations enregistrées dans la plateforme </h6>
                        <p class="text-sm"></p>
                        <hr class="dark horizontal">
                        <div class="d-flex">
                            <i class="material-icons text-sm my-auto me-1">worker</i>
                            <p class="mb-0 text-sm">Par autoentrepreneur</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-6 mt-4 mb-3">
                <div class="card z-index-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-line-tasks" class="chart-canvas" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0">Répartition des opérations enregistrées dans la plateforme </h6>
                        <p class="text-sm"></p>
                        <hr class="dark horizontal">
                        <div class="d-flex">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">Par mois</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card mb-3">
            <div class="card-body p-3">
                <div class="chart">
                    <canvas id="mixed-chart" class="chart-canvas" height="400px"></canvas>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0">La représentation du nombre d'utilisateurs de la plateforme</h6>
                <p class="text-sm"></p>
                <hr class="dark horizontal">
                <div class="d-flex">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">en fonction du temps</p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Bar Chart
            var ctx = document.getElementById("chart-bars").getContext("2d");

new Chart(ctx, {
    type: "bar",
    data: {
        labels: {!! $barLabels !!},
        datasets: [{
            label: "nombre d'opérations",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "rgba(255, 255, 255, .8)",
            data: {!! $barData !!},
            maxBarThickness: 6
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                    color: "#fff"
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});
   
            // Line Chart
            var chartData = {!! json_encode($lineData) !!}; // Encode PHP array to JavaScript object
            var lineCtx = document.getElementById('chart-line-tasks').getContext('2d');
new Chart(lineCtx, {
    type: 'line',
    data: {
        labels: chartData.labels,
        datasets: [{
            label: "nombre d'opérations",
            tension: 0.4, // Adjust tension value for the curve
            borderWidth: 2,
            borderColor: "rgba(255, 255, 255, .8)",
            backgroundColor: "transparent",
            fill: false, // Prevent filling the area under the line
            data: chartData.data,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            pointRadius: 5
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});
    
            // Mixed Chart
            var mixedCtx = document.getElementById('mixed-chart').getContext('2d');
    new Chart(mixedCtx, {
        type: 'bar',
        data: {
            labels: {!! $months !!},
            datasets: [{
                type: 'line',
                label: 'Nombre d\'utilisateurs',
                data: {!! $userCounts !!},
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 2,
                fill: false
            }, {
                type: 'bar',
                label: 'Nombre d\'utilisateurs',
                data: {!! $userCounts !!},
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderRadius: 4,
                borderWidth: 0,
                maxBarThickness: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Nombre d\'utilisateurs'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Mois'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });
        });
    </script>
   
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
@endsection


</div>
</main>
