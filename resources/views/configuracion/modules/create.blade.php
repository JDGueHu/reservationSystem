@extends('shared.main')
@section('title','Configuración/Módulo/Crear')

@section('content')



{!! Form::open(['route' => 'modulo.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('table','Nombre tabla')  !!}
		<select name="table" id="table" class='form-control' required >
			<option value="" selected="">Seleccione nombre tabla</option>
			@foreach ($tables as $table) 
				<option value="{{$table->Tables_in_reservation_system}}">{{$table->Tables_in_reservation_system}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre módulo')  !!}
		{!! Form::text('name',null,['class' => 'form-control', 'required','placeholder' => 'Nombre'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('modulo.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}

@endsection
