@extends('shared.main')
@section('title','Configuración/Estados reserva/Editar')

@section('content')
{!! Form::model($booking_state,['route' => ['estadoReserva.update',$booking_state->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$booking_state->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('status','Estado')  !!}
		{!! Form::text('status',$booking_state->status,['class' => 'form-control', 'required','placeholder' => 'Estado'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{ URL::route('estadoReserva.index') }}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection
