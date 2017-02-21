<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de reservas</title>

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/data_table/css/dataTables.bootstrap4.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/clockpicker/css/bootstrap-clockpicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/datepicker/css/bootstrap-datepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap_toggle/css/bootstrap-toggle.min.css') }}">

	<script src="{{ asset('plugins/jquery/js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/data_table/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('plugins/data_table/js/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('plugins/jquery_confirm/jquery.confirm.js') }}"></script>
	<script src="{{ asset('plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
	<script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap_toggle/js/bootstrap-toggle.min.js') }}"></script>

</head>
<body>
	
	<div class="container">
			@include('flash::message')
			<h4>@yield('title')</h4>
			@yield('warning') 
			@yield('content') 
			@yield('js') 
	</div>



</body>



</html>