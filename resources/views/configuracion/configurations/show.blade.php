@extends('shared.main')
@section('title','Configuración/Configuraciones parámetros/Ver')

@section('content')
{!! Form::model($configuration) !!}

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
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/configurations/show.js') }}"></script>
@endsection