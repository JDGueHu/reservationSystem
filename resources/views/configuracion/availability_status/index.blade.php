@extends('shared.main')
@section('title','Configuración/Estados reserva')

@section('content')
	
	<a href="{{ route('estadoDisponibilidad.create') }}" class="btn btn-primary">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Iniciales</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($availability_status as $status)
					<tr>
						<td>{{ $status->initials }}</td>
						<td>{{ $status->status }}</td>
						<td>
							<a title="Ver" href="{{ route('estadoDisponibilidad.show',$status->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('estadoDisponibilidad.edit',$status->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('estadoDisponibilidad.destroy',$status->id) }}" class="btn btn-danger btn-xs confirm">
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