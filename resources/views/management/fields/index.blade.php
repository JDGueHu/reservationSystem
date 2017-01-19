@extends('shared.main')
@section('title','Administración/Escenarios')

@section('content')

	<a href="{{ route('escenario.create') }}" class="btn btn-primary">Crear</a>	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-condensed" cellspacing="0" width="100%">
			<thead>
		        <tr>
		        	<th>Iniciales</th>
					<th>Nombre</th>
					<th>Deporte</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
 				@foreach($fields as $field)
					<tr>
						<td>{{ $field->initials }}</td>
						<td>{{ $field->name }}</td>
						<td>{{ $field->sport->name }}</td>
						<td>								
							<a title="Ver" href="{{ route('escenario.show',$field->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('escenario.edit',$field->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('escenario.destroy',$field->id) }}" class="btn btn-danger btn-xs confirm">
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