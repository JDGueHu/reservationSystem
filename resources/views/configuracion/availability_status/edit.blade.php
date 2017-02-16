@extends('shared.main')
@section('title','Configuración/Estados disponibilidad/Editar')

@section('content')
{!! Form::model($availability_status,['route' => ['estadoDisponibilidad.update',$availability_status->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$availability_status->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('status','Estado')  !!}
		{!! Form::text('status',$availability_status->status,['class' => 'form-control', 'required','placeholder' => 'Estado'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{ URL::route('estadoDisponibilidad.index') }}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection
