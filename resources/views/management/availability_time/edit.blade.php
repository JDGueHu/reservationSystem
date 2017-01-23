@extends('shared.main')
@section('title','Administración/Duración reserva/Editar')

@section('content')
{!! Form::model($duration,['route' => ['duracionReserva.update',$duration->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$duration->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('duration','Duración (Min)')  !!}
		{!! Form::text('duration',$duration->duration,['class' => 'form-control', 'required', 'min' => '0', 'placeholder' => 'Duración (Min)'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('duracionReserva.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection
