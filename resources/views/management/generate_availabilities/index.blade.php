@extends('shared.main')
@section('title','Administración/Generar disponibilidades')

@section('content')
	
	<a href="{{ route('generarDisponibilidad.create') }}" class="btn btn-primary">Generar</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Fecha</th>
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