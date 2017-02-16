@extends('shared.main')
@section('title','Administración/Duración reserva/Ver')

@section('content')
{!! Form::model($booking_rule,['route' => ['politicasReserva.update',$booking_rule->id], 'method' => 'PUT']) !!}

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
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>
{!! Form::close() !!}

@endsection
