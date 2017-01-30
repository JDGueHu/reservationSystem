@extends('shared.main')
@section('title','Configuración/Configuraciones parámetros/Editar')

@section('content')
{!! Form::model($configuration,['route' => ['configuracion.update',$configuration->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('configuration','Nombre parámetro')  !!}
		{!! Form::text('configuration',$configuration->configuration,['class' => 'form-control', 'required','placeholder' => 'Nombre parámetro'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('value','Valor')  !!}
		{!! Form::text('value',$configuration->value,['class' => 'form-control', 'required','placeholder' => 'Valor'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('description','Descripción')  !!}
		{!! Form::textarea('description',$configuration->description,['class' => 'form-control', 'required','placeholder' => 'Descripción'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('configuracion.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection