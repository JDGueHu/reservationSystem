@extends('shared.main')
@section('title','Administración/Duración reserva/Crear')

@section('content')
{!! Form::open(['route' => 'duracionReserva.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',null,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('duration','Duración (Min)')  !!}
		{!! Form::number('duration',null,['class' => 'form-control', 'required', 'min' => '0' ,'placeholder' => 'Duración (Min)'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('duracionReserva.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection