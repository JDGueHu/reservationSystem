@extends('shared.main')
@section('title','Administración/Escenario/Crear')

@section('content')
{!! Form::open(['route' => 'escenario.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('customer_id','Cliente')  !!}
		{!! Form::select('customer_id', $customers, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione cliente','id'=>'customer_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',null,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',null,['class' => 'form-control', 'required','placeholder' => 'Nombre'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('sport_id','Deporte')  !!}
		{!! Form::select('sport_id', $sports, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione deporte','id'=>'sport_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('details','Detalles')  !!}
		{!! Form::textarea('details',null,['class' => 'form-control', 'required','placeholder' => 'Detalles'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('escenario.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection