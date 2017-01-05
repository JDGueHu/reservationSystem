@extends('shared.main')
@section('title','Administración/Clientes/Crear')

@section('content')
{!! Form::open(['route' => 'cliente.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('identification_type_id','Tipo identificación')  !!}
		{!! Form::select('identification_type_id', $identificationTypes, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Tipo identificación','id'=>'identification_type_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('identification','Nro. identificación')  !!}
		{!! Form::text('identification',null,['class' => 'form-control', 'required','placeholder' => 'Nro. identificación','id'=>'identification'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('address','Dirección')  !!}
		{!! Form::text('address',null,['class' => 'form-control', 'required','placeholder' => 'Dirección','id'=>'address'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('cliente.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection