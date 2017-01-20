@extends('shared.main')
@section('title','Configuración/Día/Ver')

@section('content')
{!! Form::model($day) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$day->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales','id' => 'initials'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',$day->name,['class' => 'form-control', 'required','placeholder' => 'Nombre','id' => 'name'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('dia.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/days/show.js') }}"></script>
@endsection