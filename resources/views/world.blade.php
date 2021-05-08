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
                                        <a class="nav-link dropdown-toggle arrow-none active" href="/world">
                                            Олон улс
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="/">
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
                                                <th>Улс</th>
                                                <th>Шинэ тохиолдол</th>
                                                <th>Нийт тохиолдол</th>
                                                <th>Нас барсан</th>
                                                <th>Нийт нас барсан</th>
                                                <th>Шинээр эдгэсэн</th>
                                                <th>Нийт эдгэсэн</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($collection2 as $item)
                                            <tr>
                                                <td>{{$item['Country']}}</td>
                                                <td>{{$item['NewConfirmed']}}</td>
                                                <td>{{$item['TotalConfirmed']}}</td>
                                                <td>{{$item['NewDeaths']}}</td>
                                                <td>{{$item['TotalDeaths']}}</td>
                                                <td>{{$item['NewRecovered']}}</td>
                                                <td>{{$item['TotalRecovered']}}</td>
                                               
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

</body>

</html>