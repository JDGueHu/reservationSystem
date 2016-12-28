@extends('shared.main')
@section('title','Configuración/Tipo Zona')

@section('content')
	
	<a href="{{ route('tipoZona.create') }}" class="btn btn-primary">Crear</a>
	<hr>	
	<table class="table table-striped">
		<thead>
			<th>Iniciales</th>
			<th>Nombre</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($types as $type)
				<tr>
					<td>{{ $type->initials }}</td>
					<td>{{ $type->name }}</td>
					<td>
						<a href="{{ route('tipoZona.edit',$type->id) }}" class="btn btn-warning separate_left">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="{{ route('tipoZona.destroy',$type->id) }}" onclick="return confirm('¿Desea eliminar el tipo de zona?')" class="btn btn-danger separate_left">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

{{ $types->links() }}
@endsection