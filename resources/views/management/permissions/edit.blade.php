@extends('shared.main')
@section('title','Administración/Permiso/Editar')

@section('content')

{!! Form::model($permission,['route' => ['permiso.update',$permission->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$permission->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('module_id','Módulo')  !!}
		{!! Form::select('module_id', $modules, $permission->module_id, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione módulo','id'=>'module_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',$permission->name,['class' => 'form-control', 'required','placeholder' => 'Nombre'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('permiso.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>
	
{!! Form::close() !!}

@endsection