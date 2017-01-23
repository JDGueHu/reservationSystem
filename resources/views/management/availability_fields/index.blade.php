@extends('shared.main')
@section('title','Administración/Disponibilidad escenarios')

@section('content')
	
	<a href="{{ route('disponibilidadEscenario.create') }}" class="btn btn-primary">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Hora inicio</th>
					<th>Hora fin</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($availability_fields as $availability_field)
					<tr>
						<td>{{ $availability_field->ini_hour }}</td>
						<td>{{ $availability_field->fin_hour }}</td>
						<td>
							<a title="Ver" href="{{ route('disponibilidadEscenario.show',$availability_field->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('disponibilidadEscenario.edit',$availability_field->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('disponibilidadEscenario.destroy',$availability_field->id) }}" class="btn btn-danger btn-xs confirm">
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