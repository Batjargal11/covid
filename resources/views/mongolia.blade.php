<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- third party css -->
    <link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading" data-layout="topnav"
    data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-dark navbar-expand-lg topnav-menu">
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="/world">
                                            Олон улс
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none active" href="/">
                                            Монгол улс
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Ковид 19</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Огноо</th>
                                                <th>Батлагдсан</th>
                                                <th>Нас барсан</th>
                                                <th>Эдгэрсэн</th>
                                                <th>Идэвхтэй</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($collection as $item)
                                            <tr>
                                                
                                                <td>{{$item['Date']}}</td>
                                                <td>{{$item['Confirmed']}}</td>
                                                <td>{{$item['Deaths']}}</td>
                                                <td>{{$item['Recovered']}}</td>
                                                <td>{{$item['Active']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Батлагдсан тохиолдол өдрөөр</h4>
                                    <div id="line-chart-annotations" class="apex-charts" data-colors="#39afd1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Батлагдсан, Нас барсан тохиолдол</h4>

                                    <div class="mt-4">
                                        <div id="sparkline4" class="text-center" data-colors="#ffbc00,#4eb7eb"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Баганан диаграмм</h4>
                                    <div id="stacked-column" class="apex-charts" data-colors="#39afd1,#ffbc00,#e3eaef">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap4.js"></script>

    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/jquery.sparkline.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        var defaultColors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];

        var DrawSparkline = function() {
                var dataColors = $("#sparkline1").data('colors');
                var colors = dataColors ? dataColors.split(",") : defaultColors.concat();
                var deaths = [];
                var confirmed = [];
                var deaths = [];

                @foreach($collection as $item)
                deaths.push("{{$item['Deaths']}}")
                confirmed.push("{{$item['Confirmed']}}")
                @endforeach

                var dataColors = $("#sparkline4").data('colors');
                colors = dataColors ? dataColors.split(",") : defaultColors.concat();
                $('#sparkline4').sparkline(deaths, {
                    type: 'line',
                    width: "100%",
                    height: '165',
                    chartRangeMax: 50,
                    lineColor: colors[0],
                    fillColor: 'transparent',
                    lineWidth: 2,
                    highlightLineColor: 'rgba(0,0,0,.1)',
                    highlightSpotColor: 'rgba(0,0,0,.2)',
                    maxSpotColor: false,
                    minSpotColor: false,
                    spotColor: false
                });

                $('#sparkline4').sparkline(confirmed, {
                    type: 'line',
                    width: "100%",
                    height: '165',
                    chartRangeMax: 50,
                    lineColor: colors[1],
                    fillColor: 'transparent',
                    composite: true,
                    lineWidth: 2,
                    maxSpotColor: false,
                    minSpotColor: false,
                    spotColor: false,
                    highlightLineColor: 'rgba(0,0,0,1)',
                    highlightSpotColor: 'rgba(0,0,0,1)'
                });

            },
            DrawMouseSpeed = function() {
                var mrefreshinterval = 500;
                var lastmousex = -1;
                var lastmousey = -1;
                var lastmousetime;
                var mousetravel = 0;
                var mpoints = [];
                var mpoints_max = 30;
                $('html').mousemove(function(e) {
                    var mousex = e.pageX;
                    var mousey = e.pageY;
                    if (lastmousex > -1) {
                        mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey -
                            lastmousey));
                    }
                    lastmousex = mousex;
                    lastmousey = mousey;
                });
            };
        DrawSparkline();
        DrawMouseSpeed();
        var resizeChart;
        $(window).resize(function(e) {
            clearTimeout(resizeChart);
            resizeChart = setTimeout(function() {
                DrawSparkline();
                DrawMouseSpeed();
            }, 300);
        });
    });
    </script>

    <script type="text/javascript">
    var date1 = [];
    var total = [];
    @foreach($collection as $item)
    date1.push("{{$item['Date']}}")
    total.push("{{$item['Confirmed']}}")
    @endforeach
    var series = {
        "monthDataSeries1": {
            "prices": [],
            "dates": []
        }
    }
    for (i = 0; i < date1.length; i++) {
        series.monthDataSeries1.prices.push(total[i]);
        series.monthDataSeries1.dates.push(date1[i]);
    }

    var colors = ["#39afd1"];
    var dataColors = $("#line-chart-annotations").data('colors');
    if (dataColors) {
        colors = dataColors.split(",");
    }
    var options = {
        annotations: {
            yaxis: [{
                y: 100,
                borderColor: '#0acf97',
                label: {
                    borderColor: '#0acf97',
                    style: {
                        color: '#fff',
                        background: '#0acf97',
                    },
                    text: '',
                }
            }],
            xaxis: [{
                x: new Date('01 May 2021').getTime(),
                borderColor: '#775DD0',
                label: {
                    borderColor: '#775DD0',
                    style: {
                        color: '#fff',
                        background: '#775DD0',
                    },
                    text: '',
                }
            }, {
                x: new Date('08 May 2021').getTime(),
                borderColor: '#ffbc00',
                label: {
                    borderColor: '#ffbc00',
                    style: {
                        color: '#fff',
                        background: '#ffbc00',
                    },
                    orientation: 'horizontal',
                    text: '',
                }
            }],

        },
        chart: {
            height: 380,
            type: 'line',
            id: 'areachart-2'
        },
        colors: colors,
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [3],
            curve: 'straight'
        },
        series: [{
            data: series.monthDataSeries1.prices
        }],
        title: {
            text: 'Line with Annotations',
            align: 'left'
        },
        labels: series.monthDataSeries1.dates,
        xaxis: {
            type: 'datetime',
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'],
                opacity: 0.2
            },
            borderColor: '#f1f3fa'
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: false
                    }
                },
                legend: {
                    show: false
                },
            }
        }]
    }

    var chart = new ApexCharts(
        document.querySelector("#line-chart-annotations"),
        options
    );

    chart.render();

    var dataPointsLength = 10;

    window.setInterval(function() {
        getNewSeries(lastDate, {
            min: 10,
            max: 90
        });

        chart.updateSeries([{
            data: data
        }]);
    }, 2000);

    // every 60 seconds, we reset the data 
    window.setInterval(function() {
        resetData();
        chart.updateSeries([{
            data: data
        }], false, true);
    }, 60000);
    </script>

    <script>
    var colors = ["#39afd1", "#ffbc00", "#e3eaef"];
    var dataColors = $("#stacked-column").data('colors');
    if (dataColors) {
        colors = dataColors.split(",");
    }
    var deaths = [];
    var confirmed = [];
    var recovered = [];
    var date1 = [];
    var today = new Date();
    var days = 86400000;
    var sevendaysago = new Date(today - (7 * days));
    @foreach($collection as $item)
        if(new Date("{{$item['Date']}}") > sevendaysago){
            deaths.push("{{$item['Deaths']}}")
            confirmed.push("{{$item['Confirmed']}}")
            recovered.push("{{$item['Recovered']}}")

            date1.push(new Date("{{$item['Date']}}").toISOString().slice(0, 10))
        }
    @endforeach
    var options = {
        chart: {
            height: 380,
            type: 'bar',
            stacked: true,
            toolbar: {
                show: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '50%',
            },
        },
        series: [{
            name: 'Батлагдсан тохиолдол',
            data: confirmed
        }, {
            name: 'Эмчлэгдсэн',
            data: recovered
        }, {
            name: 'Нас барсан',
            data: deaths
        }],
        xaxis: {
            categories: date1,
        },
        colors: colors,
        fill: {
            opacity: 1
        },
        legend: {
            offsetY: 7,
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'],
                opacity: 0.2
            },
            borderColor: '#f1f3fa',
            padding: {
                bottom: 5
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#stacked-column"),
        options
    );

    chart.render();
    </script>
</body>

</html>