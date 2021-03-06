@extends('shared.main')
@section('title','Administración/Permiso/Crear')

@section('content')
{!! Form::open(['route' => 'permiso.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',null,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('module_id','Módulo')  !!}
		{!! Form::select('module_id', $modules, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione módulo','id'=>'module_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',null,['class' => 'form-control', 'required','placeholder' => 'Nombre'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('permiso.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection