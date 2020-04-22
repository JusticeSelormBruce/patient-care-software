<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76"
          href="{{asset('images/logo-round.png')}}">
    <link rel="icon" type="image/png" href="{{asset('images/logo-round.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Admin - Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"
          rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
          rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link href="{{asset('paper-dashboard/css/paper-dashboard.min.css')}}"
          rel="stylesheet"/>
    <link href="{{ asset('boostrap/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    @yield('title', 'Admin Dashboard')
    <style>
        img {
            width: 25px;
            height: 25px;
            border-radius: 100px !important;
        }

        body, html {
            font-family: -apple-system;

        }

        .s {
            width: 200px !important;
        }

        .img1 {
            width: 100px;
            height: 100px;
            /*border-radius: 100px!important;*/
        }

        li {
            list-style: none !important;
        }

        .icon {
            width: 30px;
            height: 30px;
            border-radius: 100px;
        }

        a, hover {
            /*color: white !important;*/
            background-color: transparent !important;
        }

        hr {
            color: white !important;
            background-color: blue !important;
            margin: 0.3rem;
        }
        /*}*/

        /*body, html {*/
        /*    font-family: "Calisto MT";*/
        /*    font-size: small;*/
        /*}*/

        table, th, td {
            font-size: small !important;
        }
    </style>
</head>
<body class="bg-light">
<div class="wrapper bg-light">
    <div class="sidebar bg-light" data-color="dark" data-active-color="danger"
         style="background-color: #1b1e21!important;width:15vw!important;">

        <div class="logo py-5">
            <a href="#" class="simple-text">
                @if($info == null)
                @else
                    <span class="row">
                       <span class="mx-auto">
                                               <img src="{{asset('storage/'.$info->logo) ?? 'logo'}}" alt="logo"
                                                    class="img1">

                       </span>
                   </span>
                @endif
            </a>

        </div>

        <div class="sidebar-wrapper s">
            <ul class="nav">

                @if(Auth::user()->role_id == 1)

                    <li>
                        <a class="dropdown-item" href="/department">
                            <img src="{{asset('icons/department.png')}}" alt="icon" class="icon"> <span
                                class="mx-2"></span>
                            Departments
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a class="dropdown-item" href="/roles-index">
                            <img src="{{asset('icons/roles.png')}}" alt="icon" class="icon"> <span class="mx-2"></span>
                            Add Roles
                        </a>
                    </li>

                    <hr>
                    <li>
                        <a class="dropdown-item" href="/list-of-users">
                            <img src="{{asset('icons/user_aacount.png')}}" alt="icon" class="icon"> <span
                                class="mx-2"></span>
                            Account Register
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a class="dropdown-item" href="/reset-password-index">
                            <img src="{{asset('icons/reset_password.png')}}" alt="icon" class="icon"> <span
                                class="mx-2"></span>
                            Reset Account
                        </a>
                    </li>
                    <hr>

                    {{--                    <li>--}}
                    {{--                        <a class="dropdown-item" href="/add_zone">--}}
                    {{--                            Zonal Details--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="dropdown-item" href="/add_region">--}}
                    {{--                            Region Details--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="dropdown-item" href="/add_national">--}}
                    {{--                            National Details--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}

                @endif
                @if(Auth::user()->role_id ==2 || Auth::user()->role_id ==3)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{asset('icons/lab_request.svg')}}" alt="icon" class="icon"> <span
                                class="mx-2"></span>  Lab Request
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/lab-request">
                                Make a Lab Request
                            </a>
                            <a class="dropdown-item" href="/request-list">
                                My Lab request
                            </a>

                        </div>
                    </li>
                        <hr>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{asset('icons/drug_prescription.png')}}" alt="icon" class="icon"> <span
                                class="mx-1"></span>    Drug Prescription
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/add-prescription">
                                New Prescription
                            </a>
                            <a class="dropdown-item" href="/prescription-list">
                                Prescription List
                            </a>

                        </div>
                    </li>
                        <hr>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{asset('icons/appointment.jpg')}}" alt="icon" class="icon"> <span
                                class="mx-2"></span>   Appointments
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/my-appointment-dashboard">
                                My Appointments
                            </a>


                        </div>
                    </li>
                        <hr>
                @endif
                <li>

                    @if(Auth::user()->role_id == 1)
                        <a href="/admin/settings">
                            <img src="{{asset('icons/setting.png')}}" alt="icon" class="icon"> <span
                                class="mx-2"></span>
                            Settings
                        </a>
                        <hr>
                    @endif
                </li>

                <li>

                    <a href="/my-notes">
                        <img src="{{asset('icons/notes.png')}}" alt="icon" class="icon"> <span
                            class="mx-2"></span>
                        My Notes
                    </a>
                    <hr>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent shadow-lg">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>

                </div>
                <ul>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle  text-success" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{asset('icons/user.jpg')}}" alt="icon" class="icon"> <span
                                class="mx-2"></span> {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="text-dark"> {{ __('Logout') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <main class=" pt-2 mt-5">
            @yield('render')
        </main>
    </div>
</div>


<script src="{{asset('paper-dashboard/js/jquery.min.js')}}"></script>
<script src="{{asset('paper-dashboard/js/popper.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('boostrap/js/bootstrap.js')}}"></script>
<script src="{{asset('boostrap/js/jquery.js')}}"></script>
<script src="{{asset('paper-dashboard/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('paper-dashboard/js/chartjs.min.js')}}"></script>
<script src="{{asset('paper-dashboard/js/bootstrap-notify.js')}}"></script>
<script src="{{asset('paper-dashboard/js/paper-dashboard.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
</script>
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
</script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#table_id1').DataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#table_id11').DataTable();
    });
</script>
</body>
</html>
