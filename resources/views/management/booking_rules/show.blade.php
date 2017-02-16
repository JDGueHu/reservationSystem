@extends('shared.main')
@section('title','Administración/Duración reserva/Ver')

@section('content')
{!! Form::model($booking_rule) !!}

	<div class="form-group">
		{!! Form::label('rule','Política')  !!}
		{!! Form::textarea('rule', $booking_rule->rule, ['class' => 'form-control', 'required','placeholder' => 'Política de reservación','id' => 'rule']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('priority','Prioridad')  !!}
		{!! Form::text('priority',$booking_rule->priority,['class' => 'form-control', 'required','placeholder' => 'Pioridad','id' => 'priority'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('politicasReserva.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>
{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/booking_rules/show.js') }}"></script>
@endsection