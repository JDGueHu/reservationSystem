@extends('shared.main')
@section('title','Configuración/Tipo Zona/Ver')

@section('content')
{!! Form::model($type) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$type->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales', 'id' => 'initials'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',$type->name,['class' => 'form-control', 'required','placeholder' => 'Nombre', 'id' => 'name'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('priority','Prioridad')  !!}
		{!! Form::selectRange('priority', $priority_ini, $priority_fin, $type->priority,['class' => 'form-control', 'required','placeholder' => 'Prioridad', 'id' => 'priority']) !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('tipoZona.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/zoneTypes/show.js') }}"></script>
@endsection
 