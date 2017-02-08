@extends('shared.main')
@section('title','Administración/Reservables')

@section('content')
	
	<a href="{{ route('generarDisponibilidad.create') }}" class="btn btn-primary">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Fecha y hora de generación</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
 				@foreach($availabilities as $availability)
					<tr>
						<td>{{ $availability->created_at }}</td>
						<td>								
							<a title="Ver" href="{{ route('generarDisponibilidad.show',$availability->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="" class="btn btn-danger btn-xs confirm">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
				@endforeach 
			</tbody>
		</table>
	</div>
@endsection

@section('js')
	<script src="{{ asset('js/table.js') }}"></script>
	<script src="{{ asset('js/shared.js') }}"></script>
@endsection