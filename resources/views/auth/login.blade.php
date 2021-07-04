
<!doctype html>
<html lang="en">
  <head>
  	<title>SIP3KM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../assets/img/logo-teknik.png">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- CSS Files -->
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/material-dashboard.css') }}"> --}}
        {{-- <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.2') }}"  rel="stylesheet" /> --}}
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dark-mode.css') }}">

	</head>

	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">SIP3KM</h3>
						<form action="{{ route('login') }}" method="POST" class="login-form">
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger" alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                </div>
                            @endif
                         {{ csrf_field() }}
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Nidn" required name="nidn">
		      		</div>
	            <div class="form-group ">
	              <input type="password" class="form-control rounded-left" placeholder="Password" required name="password">
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit  p-3 px-5">Login</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

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
    {{-- <script src="../assets/js/plugins/sweetalert2.js"></script> --}}
    <script src="{{asset('assets/js/plugins/sweetalert2.js')}}"></script>
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

	</body>
</html>


