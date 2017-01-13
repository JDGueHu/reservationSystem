@extends('shared.main')
@section('title','Administración/Permiso/Ver')

@section('content')
{!! Form::model($permission) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$permission->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales', 'id' => 'initials'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('module_id','Módulo')  !!}
		{!! Form::select('module_id', $modules, $permission->module_id, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione módulo','id'=>'module_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',$permission->name,['class' => 'form-control', 'required','placeholder' => 'Nombre', 'id' => 'name'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('permiso.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/permissions/show.js') }}"></script>
@endsection
 