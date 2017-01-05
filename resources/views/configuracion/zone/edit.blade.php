@extends('shared.main')
@section('title','Configuración/Zona/Editar')

@section('content')

{!! Form::model($zone,['route' => ['zona.update',$zone->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$zone->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',$zone->name,['class' => 'form-control', 'required','placeholder' => 'Nombre'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('zone_type_id','Tipo de zona')  !!}
		{!! Form::select('zone_type_id', $zoneTypes, $zone->zone_type_id, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione tipo de zona','id'=>'zone_type_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('zone_id','Zona padre')  !!}
		{!! Form::select('zone_id', $zones, $zone->zone_id, ['class' => 'form-control select_category', 'placeholder' => 'Seleccione zona padre','id'=>'zone_id'])  !!}	
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('zona.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

	<input type="hidden" name="zone_id_edit" value="{{ $zone->id }}" id="zone_id_edit">
{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/zone/ajax.js') }}"></script>
@endsection