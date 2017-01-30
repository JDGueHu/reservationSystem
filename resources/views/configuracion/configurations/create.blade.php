@extends('shared.main')
@section('title','Configuración/Configuraciones parámetros/Crear')

@section('content')
{!! Form::open(['route' => 'configuracion.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('configuration','Nombre parámetro')  !!}
		{!! Form::text('configuration',null,['class' => 'form-control', 'required','placeholder' => 'Nombre parámetro'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('value','Valor')  !!}
		{!! Form::text('value',null,['class' => 'form-control', 'required','placeholder' => 'Valor'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('description','Descripción')  !!}
		{!! Form::textarea('description',null,['class' => 'form-control', 'required','placeholder' => 'Descripción'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('configuracion.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection