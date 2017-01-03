@extends('shared.main')
@section('title','Configuración/Zona/Crear')

@section('content')

{!! Form::open(['route' => 'zona.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',null,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',null,['class' => 'form-control', 'required','placeholder' => 'Nombre'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('zone_type_id','Tipo de zona')  !!}
		{!! Form::select('zone_type_id', $zoneTypes, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione tipo de zona','id'=>'zone_type_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('zone_id','Zona padre')  !!}
		{!! Form::select('zone_id', $zones, null, ['class' => 'form-control select_category','id'=>'zone_id'])  !!}	
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('zona.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}"" id="token">
{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/zone.js') }}"></script>
@endsection