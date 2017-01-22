@extends('shared.main')
@section('title','Administración/Duración disponibilidad/Crear')

@section('content')
{!! Form::open(['route' => 'duracionDisponibilidad.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',null,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('duration','Duración (Min)')  !!}
		{!! Form::number('duration',null,['class' => 'form-control', 'required', 'min' => '0' ,'placeholder' => 'Duración (Min)'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('duracionDisponibilidad.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection