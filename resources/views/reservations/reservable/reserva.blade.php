@extends('shared.main')
@section('title','Reservas/Reservar')

@section('content')

{!! Form::open(['route' => 'reservable.reservaStore', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('user_id','Usuario')  !!}
		{!! Form::select('user_id', $users, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione usuario','id'=>'user_id'])  !!}	
	</div>

	<hr>

	<h2 class="text-center"><strong>Va a reservar</strong></h2>

	<div class="row">
	  <div class="col-md-4 bg-primary border_white">
		  	<p class="text-center sin_margin font_booking">
		  		<strong>Deporte:</strong>
		  	</p>
		  	<p class="text-center sin_margin font_booking">
	  			{!! $sport->name !!}
		  	</p>
	  </div>
  	  <div class="col-md-4 bg-primary border_white">
		  	<p class="text-center sin_margin font_booking">
		  		<strong>Escenario:</strong>
		  	</p>
		  	<p class="text-center sin_margin font_booking">
	  			{!! $field->name !!}
		  	</p>
	  </div>
	  <div class="col-md-4 bg-primary border_white">
		  	<p class="text-center sin_margin font_booking">
		  		<strong>Detalles escenario:</strong>
		  	</p>
		  	<p class="text-center sin_margin font_booking">
	  			{!! $field->details !!}
		  	</p>
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-4 bg-primary border_white">
		  	<p class="text-center sin_margin font_booking">
		  		<strong>Fecha de la reserva:</strong>
		  	</p>
		  	<p class="text-center sin_margin font_booking">
	  			{!! $availability->date !!}
		  	</p>
	  </div>
  	  <div class="col-md-4 bg-primary border_white">
		  	<p class="text-center sin_margin font_booking">
		  		<strong>Hora incio:</strong>
		  	</p>
		  	<p class="text-center sin_margin font_booking">
	  			{!! $availability->ini_hour !!}
		  	</p>
	  </div>
	  <div class="col-md-4 bg-primary border_white">
		  	<p class="text-center sin_margin font_booking">
		  		<strong>Hora finalización:</strong>
		  	</p>
		  	<p class="text-center sin_margin font_booking">
	  			{!! $availability->fin_hour !!}
		  	</p>
	  </div>
	</div>

	<div class="container-fluid bg-danger separador_short">
	  <p class="text-center sin_margin font_booking text_danger">Recuerde:</p>
	  <ul>
	  @foreach($rules as $rule)
	  	<li>{!! $rule->rule !!}.</li>
	  @endforeach
	  </ul>
	</div>

	<div class="form-group text-center separador">
		<a style="text-decoration: none;" href="{{{ URL::route('reservable.index',[]) }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Reservar',['class' => 'btn btn-primary'])  !!}
	</div>

	<input type="hidden" name="availability_id" value="{{ $availability->id }}" id="availability_id">
	
	<input type="hidden" name="sport" value="{{ $sport->name }}" id="sport_name">
	<input type="hidden" name="field_name" value="{{ $field->name }}" id="field_name">
	<input type="hidden" name="field_details" value="{{ $field->details }}" id="field_details">
	<input type="hidden" name="availability_date" value="{{ $availability->date }}" id="availability_date">
	<input type="hidden" name="availability_ini_hour" value="{{ $availability->ini_hour }}" id="availability_ini_hour">
	<input type="hidden" name="availability_fin_hour" value="{{ $availability->fin_hour }}" id="availability_fin_hour">


{!! Form::close() !!}

@endsection
