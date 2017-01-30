@extends('shared.main')
@section('title','Administración/Disponibilidades')

@section('content')
	
	<a href="{{ route('disponibilidad.create') }}" class="btn btn-primary">Generar</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Hora inicio</th>
					<th>Hora Fin</th>
					<th>Escenario</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
@endsection

@section('js')
	<script src="{{ asset('js/table.js') }}"></script>
	<script src="{{ asset('js/shared.js') }}"></script>
@endsection