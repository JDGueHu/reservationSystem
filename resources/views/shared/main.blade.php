<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de reservas</title>

	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/data_table/css/dataTables.bootstrap4.css') }}">

	<script src="{{ asset('plugins/jquery/js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/data_table/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('plugins/data_table/js/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('plugins/jquery_confirm/jquery.confirm.js') }}"></script>

</head>
<body>
	@include('shared.nav')
	<div class="container">
			@include('flash::message')
			<h4>@yield('title')</h4>
			@yield('content') 
			@yield('js') 
	</div>



</body>



</html>