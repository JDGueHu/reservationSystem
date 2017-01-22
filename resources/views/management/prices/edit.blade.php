@extends('shared.main')
@section('title','Administración/Precio/Editar')

@section('content')
{!! Form::model($price,['route' => ['precio.update',$price->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$price->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('price','Precio')  !!}
		{!! Form::number('price',$price->price,['class' => 'form-control', 'min' => '0', 'required', 'min' => '0', 'placeholder' => 'Precio'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('precio.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection