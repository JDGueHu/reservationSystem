@extends('shared.main')
@section('title','Administración/Rol/Ver')

@section('content')
{!! Form::model($role) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$role->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales', 'id' => 'initials'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',$role->name,['class' => 'form-control', 'required','placeholder' => 'Nombre', 'id' => 'name'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('rol.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/roles/show.js') }}"></script>
@endsection