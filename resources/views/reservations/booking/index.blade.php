@extends('shared.main')
@section('title','Administración/Reservas')

@section('content')

	<hr>

	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Fecha/Hora reservación</th>
					<th>Id reserva</th>
					<th>Usuario</th>
					<th>Fecha reserva</th>
					<th>Hora inicio</th>
					<th>Hora fin</th>
					<th>Escenario</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($bookings as $booking)
					<tr>
						<td>{{ $booking->created_at }}</td>
						<td>{{ $booking->booking_id }}</td>
						<td>{{ $booking->email }}</td>
						<td>{{ $booking->date }}</td>
						<td>{{ $booking->ini_hour }}</td>
						<td>{{ $booking->fin_hour }}</td>
						<td>{{ $booking->name }}</td>
						@if($booking->status == 'Confirmada')
							<td><span class="label label-success">{{ $booking->status }}</span></td>
						@else
							@if($booking->status == 'Cancelada')
								<td><span class="label label-danger">{{ $booking->status }}</span></td>
							@else
								<td><span class="label label-warning">{{ $booking->status }}</span></td>
							@endif
						@endif
						<td>
							<a title="Confirmar reserva" data-toggle="tooltip" href="{{ route('reserva.confirmarReserva', $booking->id) }}" class="btn btn-primary btn-xs">
								Confirmar</span>
							</a>
							<a title="Cancelar reserva" data-toggle="tooltip" href="{{ route('reserva.cancelarReserva', $booking->id) }}" class="btn btn-default btn-xs">
								Canelar </span>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

@endsection

@section('js')
	<script src="{{ asset('js/reservable/index.js') }}"></script>
	<script src="{{ asset('js/tooltip.js') }}"></script>
	<script src="{{ asset('js/table.js') }}"></script>
	<script src="{{ asset('js/shared.js') }}"></script>
@endsection