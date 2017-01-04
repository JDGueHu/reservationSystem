@extends('shared.main')
@section('title','Configuración/Tipo Zona')

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
							<a href="{{ route('tipoZona.edit',$type->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a href="{{ route('tipoZona.destroy',$type->id) }}" onclick="return confirm('¿Desea eliminar el tipo de zona?')" class="btn btn-danger btn-xs">
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
@endsection