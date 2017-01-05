@extends('shared.main')
@section('title','Configuración/Tipos Zona')

@section('content')
	
	<a href="{{ route('tipoZona.create') }}" class="btn btn-primary">Crear</a>
	<hr>	
	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
		        <tr>
					<th>Iniciales</th>
					<th>Nombre</th>
					<th>Prioridad</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($types as $type)
					<tr>
						<td>{{ $type->initials }}</td>
						<td>{{ $type->name }}</td>
						<td>{{ $type->priority }}</td>
						<td>
							<a title="Consultar" href="{{ route('tipoZona.show',$type->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('tipoZona.edit',$type->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('tipoZona.destroy',$type->id) }}" class="btn btn-danger btn-xs confirm">
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
	<script src="{{ asset('js/index.js') }}"></script>
@endsection