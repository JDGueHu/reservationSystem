@extends('shared.main')
@section('title','Administración/Escenario/Disponibilidad')

@section('content')
	
	<hr>
	<div class="row">
 	 	<div class="col-md-6">
 	 		{!! Form::label('ini_hour','Hora inicial')  !!}
 	 		<div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
	    		<input type="text" class="form-control" required>
	   			<span class="input-group-addon">
	        		<span class="glyphicon glyphicon-time"></span>
	    		</span>
			</div>
		</div>
  		<div class="col-md-6">
  			{!! Form::label('fin_hour','Hora final')  !!}
 	 		<div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
	    		<input type="text" class="form-control" required>
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
	  			{!! Form::checkbox('days', $day->name, null); !!}
	  			<span class="label label-primary">{{$day->name}}</span>
  			</div>
  			<div style="width: 100%" class="container">
  				{!! Form::label('ini_hour','Precio')  !!}
	  			{!! Form::number('name', null, ['class' => 'precio', 'id' => $day->name]); !!}
  			</div>
		</div>
	@endforeach
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('escenario.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default separador_short'])  !!}
		</a>
	</div>

@endsection


@section('js')
<script type="text/javascript">
$('.clockpicker').clockpicker({
	placement: 'bottom',
	align: 'right'
});
</script>
<script src="{{ asset('js/fields/ajax.js') }}"></script>
@endsection