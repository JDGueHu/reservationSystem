@extends('shared.main')
@section('title','Configuración/Módulo/Editar')

@section('content')

{!! Form::model($module,['route' => ['modulo.update',$module->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('table','Nombre tabla')  !!}
		<select name="table" id="table" class='form-control' required >
			<option value="" selected="">Seleccione nombre tabla</option>
			@foreach ($tables as $table) 
				@if ($module->table == $table->Tables_in_reservation_system)
					<option value="{{$table->Tables_in_reservation_system}}" selected>{{$table->Tables_in_reservation_system}}</option>
				@endif
				<option value="{{$table->Tables_in_reservation_system}}">{{$table->Tables_in_reservation_system}}</option>	
			@endforeach
		</select>
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',$module->name,['class' => 'form-control', 'required','placeholder' => 'Nombre'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('modulo.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>
	
{!! Form::close() !!}

@endsection
