@extends('shared.main')
@section('title','Configuración/Estados reserva/Crear')

@section('content')
{!! Form::open(['route' => 'estadoReserva.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',null,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('status','Estado')  !!}
		{!! Form::text('status',null,['class' => 'form-control', 'required','placeholder' => 'Estado'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('estadoReserva.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection