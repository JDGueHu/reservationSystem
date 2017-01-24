@extends('shared.main')
@section('title','Administración/Precio/Crear')

@section('content')
{!! Form::open(['route' => 'precio.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',null,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('price','Precio')  !!}
		{!! Form::number('price',null,['class' => 'form-control', 'min' => '0', 'required','placeholder' => 'Precio', 'id' => 'price'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('precio.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection