@extends('shared.main')
@section('title','Configuración/Zona')

@section('content')

	<a href="{{ route('zona.create') }}" class="btn btn-primary">Crear</a>	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-condensed" cellspacing="0" width="100%">
			<thead>
		        <tr>
					<th>Iniciales</th>
					<th>Nombre</th>
					<th>Tipo zona</th>
					<th>Zona padre</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($zones as $zone)
					<tr>
						<td>{{ $zone->initials }}</td>
						<td>{{ $zone->name }}</td>
						<td>{{ $zone->zone_type->name }}</td>
						@if($zone->zone_id == null)
							<td>{{ $zone->zone_id }}</td>
						@else
							<td>{{ $zone->zone->name }}</td>
						@endif
						<td>
							<a href="{{ route('zona.edit',$zone->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a href="{{ route('zona.destroy',$zone->id) }}" onclick="return confirm('¿Desea eliminar la zona?')" class="btn btn-danger btn-xs">
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