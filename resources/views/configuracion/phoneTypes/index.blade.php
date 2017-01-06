@extends('shared.main')
@section('title','Configuración/Tipos teléfono')

@section('content')

	<a href="{{ route('tipoTelefono.create') }}" class="btn btn-primary">Crear</a>	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-condensed" cellspacing="0" width="100%">
			<thead>
		        <tr>
					<th>Iniciales</th>
					<th>Nombre</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($types as $type)
					<tr>
						<td>{{ $type->initials }}</td>
						<td>{{ $type->name }}</td>
						<td>								
							<a title="Ver" href="{{ route('tipoTelefono.show',$type->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('tipoTelefono.edit',$type->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('tipoTelefono.destroy',$type->id) }}" class="btn btn-danger btn-xs confirm">
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