@extends('shared.main')
@section('title','Administración/Rol/Permisos')

@section('content')
{!! Form::open() !!}
	
	@foreach($modules as $module)
	<h4 class="separador">{!! Form::label('module','Módulo '.$module->name, ['class' => 'label label-primary'])  !!}</h4>
		<div class="row">			
			@foreach($permissions as $permission)			
				@if($module->id == $permission->module_id)
					<div class="col-md-4">
					{!! Form::checkbox('name', $permission->name,false,['id'=> $permission->id])  !!}
					{{Form::label('initials',$permission->name)}}	
					</div>
				@endif
			@endforeach
		</div>

	@endforeach

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('rol.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection