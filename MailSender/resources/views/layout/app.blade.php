<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("/assets/img/apple-icon.png")}}">
    <link rel="icon" type="image/png" href="{{asset("/assets/img/favicon.png")}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Mail Sender
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link crossorigin="anonymous" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <!-- CSS Files -->


    <link href="{{asset("/assets/css/bootstrap.min.css")}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">

    <link href="{{asset("/assets/css/timepicker.css")}}" rel="stylesheet" />

    <link href="{{asset("/assets/css/now-ui-dashboard.css?v=1.1.0")}}" rel="stylesheet" />




    <style>
        .sidebar .sidebar-wrapper{
            height: 100vh;
        }
        .ui-timepicker-wrapper{
            width: 260px;
        }
    </style>

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="orange">

        <div class="sidebar-wrapper">
            <ul class="nav">

                <li id="receiver">
                    <a href="{{ route('dashboard') }}">
                        <p>Receivers</p>
                    </a>
                </li>

                <li id="sendEmail">
                    <a href="{{ route('sendEmail') }}">
                        <p>Send Email</p>
                    </a>
                </li>



            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav style="background: #f96332 !important" class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" style="text-align: right" id="navigation">

                    @if(Session::has('user'))
                        <p class="mr-1"> {{Session::get('user')->name}}</p>
                        <a href="{{route('logout')}}">Logout</a>
                    @endif
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div
                style="height: unset; padding-top: unset;"
                class="panel-header panel-header-sm"></div>

        @yield('content')


        <footer class="footer">
            <div class="container-fluid">

            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset("/assets/js/core/jquery.min.js")}}"></script>
<script src="{{asset("/assets/js/timepicker.js")}}"></script>


<script src="{{asset("/assets/js/core/popper.min.js")}}"></script>
<script src="{{asset("/assets/js/core/bootstrap.min.js")}}"></script>

<script src="{{asset("/assets/js/plugins/perfect-scrollbar.jquery.min.js")}}"></script>
<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
<!-- Chart JS -->
<script src="{{asset("/assets/js/plugins/chartjs.min.js")}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset("/assets/js/plugins/bootstrap-notify.js")}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset("/assets/js/now-ui-dashboard.min.js?v=1.1.0")}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>

@yield('js')

</body>

</html>