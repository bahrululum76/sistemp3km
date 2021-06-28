<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8" />



    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo-teknik.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        SIP3KM
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/material-dashboard.css') }}">
    <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.2') }}"  rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dark-mode.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
</head>
<body id="main">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a  class="simple-text " href="#">
                    SIP3KM V1.0
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item{{ (Route::current()->uri === 'Dashboard') ? ' active' : '' }}">
                        <a class="nav-link" href="Home">
                            <i class="material-icons">dashboard</i>
                            <p class="teks-sidebar">Dashboard</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item {{ (Route::current()->uri === 'Dashboard') ? ' active' : '' }}"" >
                        <a class="nav-link"  href="{{route ('pilih_review')}}">
                            <i class="material-icons">person</i>
                            <p class="teks-sidebar">Pilih Reviewer Penelitian</p>
                        </a>
                    </li>

                    <li class="nav-item {{ (Route::current()->uri === 'Dashboard') ? ' active' : '' }}"" >
                        <a class="nav-link"  href="pilih_review_pengabdian" >
                            <i class="material-icons">person</i>
                            <p class="teks-sidebar">Pilih Reviewer Pengabdian</p>
                        </a>
                    </li> -->
                    <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="teks-sidebar">
                                   Pilih Reviewer
                                    </p>
                                </a>
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="pilih_review"><p class="teks-sidebar"> Penelitian </p> </a>
                                    <a class="dropdown-item" href="pilih_review_pengabdian"><p class="teks-sidebar"> Pengabdian</p> </a>
                                   
                                </div> 
                    </li>
                    <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">library_books</i>
                                    <p class="teks-sidebar">
                                   Laporan Kemajuan
                                    </p>
                                </a>
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="laporankemajuanpenelitian"><p class="teks-sidebar">Penelitian</p> </a>
                                    <a class="dropdown-item" href="laporankemajuanpengabdian"><p class="teks-sidebar">Pengabdian</p> </a>
                                   
                                </div> 
                    </li>   
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="laporanakhirpenelitian">
                            
                            <p class="teks-sidebar"><i class="material-icons">library_books</i> laporan akhir penelitian</p>
                        </a>
                        
                    </li> -->
                    
                    <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">library_books</i>
                                    <p class="teks-sidebar">
                                   Laporan Akhir
                                    </p>
                                </a>
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="laporanakhirpenelitian"><p class="teks-sidebar">Penelitian</p> </a>
                                    <a class="dropdown-item" href="laporanakhirpengabdian"><p class="teks-sidebar">Pengabdian</p> </a>
                                   
                                </div> 
                    </li>                        
                   
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="laporanakhirpengabdian">
                            <i class="material-icons">library_books</i>
                            <p class="teks-sidebar"> laporan akhir pengabdian</p>
                        </a>
                        
                    </li> -->

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                        <ul>
                            <li class="nav-item" style="list-style:none">

                              <label class="switch">
                                <input type="checkbox" onclick="darkLight()" id="checkBox" >
                                <span class="slider"></span>
                              </label> </li>
                                {{-- <label class='switch' for='Night'>
                                <input id='Night' type='checkbox'/>
                                <div class='slider round'>
                            </label>  --}}

                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{-- {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}

                        </ul>


                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">


                            {{-- <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div> --}}
                        </form>
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">
                                    <i class="material-icons">dashboard</i>

                                    <p class="d-lg-none d-md-block">
                                        Stats
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    {{-- <span class="notification"></span> --}}
                                    <p class="d-lg-none d-md-block">

                                    </p>
                                </a>
                                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                    <a class="dropdown-item" href="#">Another Notification</a>
                                    <a class="dropdown-item" href="#">Another One</a>
                                </div>  -->
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="">{{ Auth::user()->name }}</i>
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">

                    @yield('container-fluid')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="">

                                </a>
                            </li>
                            <li>
                                <a href="">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="fixed-plugin">
       </div>
    <!--   Core JS Files   -->
    {{-- <script src="../assets/js/core/jquery.min.js"></script> --}}
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>

    {{-- <script src="../assets/js/core/popper.min.js"></script> --}}
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    {{-- <script src="../assets/js/core/bootstrap-material-design.min.js"></script> --}}
    <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}"></script>
    {{-- <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> --}}
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!-- Plugin for the momentJs  -->
    {{-- <script src="../assets/js/plugins/moment.min.js"></script> --}}
    <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
    <!--  Plugin for Sweet Alert -->
    <!-- {{-- <script src="../assets/js/plugins/sweetalert2.js"></script> --}} -->
    <!-- <script src="{{asset('assets/js/plugins/sweetalert2.js')}}"></script> -->
    <!-- Forms Validations Plugin -->
    {{-- <script src="../assets/js/plugins/jquery.validate.min.js"></script> --}}
    <script src="{{asset ('assets/js/plugins/jquery.validate.min.js') }}"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    {{-- <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script> --}}
    <script src="{{asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    {{-- <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script> --}}
    <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    {{-- <script src="../assets/js/plugins/jquery.dataTables.min.js"></script> --}}

    {{-- <script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>


    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    {{-- <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script> --}}
    <script src="{{asset('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    {{-- <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script> --}}
    <script src="{{asset('assets/js/plugins/jasny-bootstrap.min.js')}}" ></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    {{-- <script src="../assets/js/plugins/fullcalendar.min.js"></script> --}}
    <script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    {{-- <script src="../assets/js/plugins/jquery-jvectormap.js"></script> --}}
    <script src="{{asset('assets/js/plugins/jquery-jvectormap.js')}}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    {{-- <script src="../assets/js/plugins/nouislider.min.js"></script> --}}
    <script src="{{asset('assets/js/plugins/nouislider.min.js')}}"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{ asset('assets/js/plugins/arrive.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <!-- Chartist JS -->
    {{-- <script src="../assets/js/plugins/chartist.min.js"></script> --}}
    <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    {{-- <script src="../assets/js/plugins/bootstrap-notify.js"></script> --}}
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}" ></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script> --}}
    <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.2') }}"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>

    {{-- <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script> --}}

    {{-- <script>//<![CDATA[
        $("#Night").click(function(){
        $("body").toggleClass('Night');
        console.log("HI");
        });
        //]]></script> --}}

    {{-- <script>
        // Check browser support
        if (typeof(Storage) !== "undefined") {
          // Store
          localStorage.setItem("mode", "Night");
          if (localStorage.getItem('dark')) {
              console.log(document.getElementsByTagName('body'))

          }
          // Retrieve
          document.getElementById("result").innerHTML = localStorage.getItem("mode");
        } else {
          document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
        }
        </script> --}}
    <script>

        $('#main').toggleClass(localStorage.toggled);

        function darkLight() {
            /*DARK CLASS*/
            if (localStorage.toggled != 'dark') {
                $('#main, p').toggleClass('dark', true);
                localStorage.toggled = "dark";
            } else {
                $('#main, p').toggleClass('dark', false);
                localStorage.toggled = "";
            }
        }

        /*Add 'checked' property to input if background == dark*/
        if ($('body').hasClass('dark')) {
            $( '#checkBox' ).prop( "checked", true )
        } else {
            $( '#checkBox' ).prop( "checked", false )
        }
    </script>
<script>
        $(document).ready(function() {
    $('#myTable').DataTable();
} );
    </script>

</body>
</html>
