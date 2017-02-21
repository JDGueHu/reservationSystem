@extends('shared.main')
@section('title','Administración/Disponibilidades')

@section('content')

	{!! Form::open(['route' => 'reservable.index', 'method' => 'GET', 'id' => 'reservableForm']) !!}
		<div class="row">
		  <div class="col-md-4">
			{!! Form::label('customer_id','Cliente')  !!}
			{!! Form::select('customer_id', $customers, $customerSelected, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione cliente','id'=>'customer_id'])  !!}	
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
						<input type="hidden" class="{{ $availability->id }}" value="{{ $availability->id }}">
						<td>{{ $availability->date }}</td>
						<td>{{ $availability->ini_hour }}</td>
						<td>{{ $availability->fin_hour }}</td>
						<td>{{ $availability->field->name }}</td>
						@if($availability->availability_status->status == 'No disponible')
							<td><span class="label label-warning">{{ $availability->availability_status->status }}</span></td>
						@else
							@if($availability->availability_status->status == 'Vencida')
								<td><span class="label label-danger">{{ $availability->availability_status->status }}</span></td>
							@else
								<td><span class="label label-success">{{ $availability->availability_status->status }}</span></td>
							@endif
						@endif
						<td>
							<a title="Reservar" data-toggle="tooltip" href="{{ route('reservable.reserva',$availability->id) }}" class="btn btn-primary btn-xs">
								Reservar
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