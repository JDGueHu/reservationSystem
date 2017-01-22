@extends('shared.main')
@section('title','Configuración/Tipo identificación/Ver')

@section('content')
{!! Form::model($duration) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$duration->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales','id' => 'initials'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('duration','Duración (Min)')  !!}
		{!! Form::number('duration',$duration->duration,['class' => 'form-control', 'min' => '0' , 'required','placeholder' => 'Duración (Min)','id' => 'duration'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('duracionDisponibilidad.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/availability_time/show.js') }}"></script>
@endsection