@extends('shared.main')
@section('title','Configuración/Estados reserva/Ver')

@section('content')
{!! Form::model($booking_state) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$booking_state->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('status','Estado')  !!}
		{!! Form::text('status',$booking_state->status,['class' => 'form-control', 'required','placeholder' => 'Estado'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('estadoReserva.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/booking_status/show.js') }}"></script>
@endsection