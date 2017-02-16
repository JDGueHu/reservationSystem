@extends('shared.main')
@section('title','Configuración/Estados disponibilidad/Ver')

@section('content')
{!! Form::model($availability_status) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$availability_status->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('status','Estado')  !!}
		{!! Form::text('status',$availability_status->status,['class' => 'form-control', 'required','placeholder' => 'Estado'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('estadoDisponibilidad.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/availability_status/show.js') }}"></script>
@endsection