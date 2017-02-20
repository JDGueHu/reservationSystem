@extends('shared.main')
@section('title','Administración/Reservas')

@section('content')

	{!! Form::open(['route' => 'reserva.index', 'method' => 'GET', 'id' => 'reservableForm']) !!}
		<div class="row">
		  <div class="col-md-4">
  			{!! Form::label('user_email','Email usuario')  !!}
			{!! Form::select('user_email', $users, $user_id, ['class' => 'form-control', 'placeholder' => 'Seleccione usuario','id'=>'user_email'])  !!}
		  </div>
	  	  <div class="col-md-4">
			{!! Form::label('booking_id','Código reserva')  !!}
			{!! Form::text('booking_id',$booking_id,['class' => 'form-control','placeholder' => 'Código reserva','id'=>'booking_id'])  !!}
		  </div>
  	  	  <div class="col-md-4">
  	  	  	<label style="width: 100%;color:#ffffff">Filtrar</label>
			{!! Form::submit('Filtrar',['class' => 'btn btn-primary'])  !!}
		  </div>
		</div>
	{!! Form::close() !!}
	<hr>

	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Id reserva</th>
					<th>Usuario</th>
					<th>Fecha reserva</th>
					<th>Hora inicio</th>
					<th>Hora fin</th>
					<th>Escenario</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($bookings as $booking)
					<tr>
						<td>{{ $booking->booking_id }}</td>
						<td>{{ $booking->email }}</td>
						<td>{{ $booking->date }}</td>
						<td>{{ $booking->ini_hour }}</td>
						<td>{{ $booking->fin_hour }}</td>
						<td>{{ $booking->name }}</td>
						<td>
							<a title="Confirmar reserva" data-toggle="tooltip" href="" class="btn btn-success btn-xs">
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							</a>
							<a title="Cancelar reserva" data-toggle="tooltip" href="" class="btn btn-danger btn-xs">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
							<a title="Registrar pago" data-toggle="tooltip" href="" class="btn btn-primary btn-xs">
								<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
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