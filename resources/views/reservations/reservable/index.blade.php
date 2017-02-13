@extends('shared.main')
@section('title','Administración/Reservable')

@section('content')

	{!! Form::open(['route' => 'reservable.index', 'method' => 'GET', 'id' => 'reservableForm']) !!}
		<div class="row">
		  <div class="col-md-4">
			{!! Form::label('customer_id','Cliente')  !!}
			{!! Form::select('customer_id', $customers, $customerSelected, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione cliente','id'=>'customer_id'])  !!}	
		  </div>
		  <div class="col-md-4">
			{!! Form::label('field_id','Escenario')  !!}
			{!! Form::select('field_id', $fields, $fieldSelected, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione cliente','id'=>'field_id'])  !!}	
		  </div>
	  	  <div class="col-md-4">
	  	  	{!! Form::label('date','Fecha')  !!}
			<div class="input-group date" >
			    <input type="text" class="form-control datepicker" name="date" id="date" value="{{ $dateSelected }}" placeholder="YYYY-MM-DD">
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
		  </div>
		</div>
	{!! Form::close() !!}
	<hr>

	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Hora inicio</th>
					<th>Hora fin</th>
					<th>Escenario</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($availabilities as $availability)
					<tr>
						<td>{{ $availability->date }}</td>
						<td>{{ $availability->ini_hour }}</td>
						<td>{{ $availability->fin_hour }}</td>
						<td>{{ $availability->field_id }}</td>
						<td>{{ $availability->availability_status_id }}</td>
						<td>
							<a title="Reservar" data-toggle="tooltip" href="" class="btn btn-success btn-xs">
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							</a>
							<a title="Confirmar reserva" data-toggle="tooltip" href="" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-check" aria-hidden="true"></span>
							</a>
							<a title="Cancelar reserva" data-toggle="tooltip" href="" class="btn btn-danger btn-xs">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
							<a title="Confirmar pago" data-toggle="tooltip" href="" class="btn btn-info btn-xs">
								<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
							</a>
							<a title="Habilitar / Inhabilitar disponibilidad" data-toggle="tooltip" href="" class="">
								@if($availability->enable == true)
									<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-size="mini">
								@else
									<input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="mini">
								@endif
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