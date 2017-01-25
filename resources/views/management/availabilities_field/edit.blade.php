@extends('shared.main')
@section('title','Administración/Disponibilidad escenario/Crear')

@section('content')

	<hr>
	<div class="row">
 	 	<div class="col-md-6">
 	 		{!! Form::label('ini_hour','Hora inicial')  !!}
 	 		<div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
	    		<input type="text" class="form-control" required id="ini_hour" value="{{ $availability_field->ini_hour }}">
	   			<span class="input-group-addon">
	        		<span class="glyphicon glyphicon-time"></span>
	    		</span>
			</div>
		</div>
  		<div class="col-md-6">
  			{!! Form::label('fin_hour','Hora final')  !!}
 	 		<div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
	    		<input type="text" class="form-control" required id="fin_hour" value="{{ $availability_field->fin_hour }}">
	   			<span class="input-group-addon">
	        		<span class="glyphicon glyphicon-time"></span>
	    		</span>
			</div>
  		</div>
	</div>

	<div class="row">
	@foreach($days as $day)
  		<div class="col-md-4 separador_short">
  			<div style="width: 100%" class="container">
	  			{!! Form::checkbox('days', $day->id, null); !!}
	  			<span class="label label-primary">{{$day->name}}</span>
  			</div>
  			<div style="width: 100%" class="container">
  				{!! Form::label('ini_hour','Precio')  !!}
				{!! Form::select('price', $prices, null, ['class' => 'form-control precio', 'required', 'placeholder' => 'Seleccione precio','id' => $day->id])  !!}	
  			</div>
		</div>
	@endforeach
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('disponibilidadEscenario.index', $field_id) }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary ajax_button'])  !!}

	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<input type="hidden" name="field_id" value="{{ $field_id }}" id="field_id">
	<input type="hidden" name="availability_field_id" value="{{ $availability_field->id }}" id="availability_field_id">
	<input type="hidden" name="days_availabilities_per_field" value="{{ $days_availabilities_per_field }}" id="days_availabilities_per_field">
	<input type="hidden" name="prices_availabilities_per_field" value="{{ $prices_availabilities_per_field }}" id="prices_availabilities_per_field">
	
	</div>

@endsection


@section('js')
<script type="text/javascript">
$('.clockpicker').clockpicker({
	placement: 'bottom',
	align: 'right'
});
</script>

<script src="{{ asset('js/availabilities_field/ajax.js') }}"></script>
<script src="{{ asset('js/availabilities_field/edit.js') }}"></script>
@endsection