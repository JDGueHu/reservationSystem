@extends('shared.main')
@section('title','Configuración/Zona')

@section('content')
	
	<a href="{{ route('zona.create') }}" class="btn btn-primary">Crear</a>
	<hr>	
	<table class="table table-striped">
		<thead>
			<th>Iniciales</th>
			<th>Nombre</th>
			<th>Tipo zona</th>
			<th>Padre</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($zones as $zone)
				<tr>
					<td>{{ $zone->initials }}</td>
					<td>{{ $zone->name }}</td>
					<td>
						<a href="{{ route('tipoIdentificacion.edit',$type->id) }}" class="btn btn-warning separate_left">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="{{ route('tipoIdentificacion.destroy',$type->id) }}" onclick="return confirm('¿Desea eliminar el tipo de identificación?')" class="btn btn-danger separate_left">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

{{ $zones->links() }}
@endsection