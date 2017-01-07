@extends('shared.main')
@section('title','Configuración/Tipo teléfono/Ver')

@section('content')

{!! Form::model($type) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$type->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',$type->name,['class' => 'form-control', 'required','placeholder' => 'Nombre'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('tipoTelefono.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
	</div>
	
{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/phoneTypes/show.js') }}"></script>
@endsection
