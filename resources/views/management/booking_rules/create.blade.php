@extends('shared.main')
@section('title','Administración/Crear/Políticas reservación')

@section('content')
{!! Form::open(['route' => 'politicasReserva.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('rule','Política')  !!}
		{!! Form::textarea('rule', null, ['class' => 'form-control', 'required','placeholder' => 'Política de reservación']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('priority','Prioridad')  !!}
		{!! Form::text('priority',$booking_rules_max_priority,['class' => 'form-control', 'required','placeholder' => 'Pioridad'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('politicasReserva.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection