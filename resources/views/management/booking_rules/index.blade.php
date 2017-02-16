@extends('shared.main')
@section('title','Administración/Políticas reservación')

@section('content')
	
	<a href="{{ route('politicasReserva.create') }}" class="btn btn-primary">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Política</th>
					<th>Prioridad</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($booking_rules as $booking_rule)
					<tr>
						<td>{{ $booking_rule->rule }}</td>
						<td>{{ $booking_rule->priority }}</td>
						<td>
							<a title="Ver" href="{{ route('politicasReserva.show', $booking_rule->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('politicasReserva.edit', $booking_rule->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('politicasReserva.destroy', $booking_rule->id) }}" class="btn btn-danger btn-xs confirm">
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