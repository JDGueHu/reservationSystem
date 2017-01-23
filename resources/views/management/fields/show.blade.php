@extends('shared.main')
@section('title','Administración/Escenario/Ver')

@section('content')
{!! Form::model($field) !!}

	<div class="form-group">
		{!! Form::label('customer_id','Cliente')  !!}
		{!! Form::select('customer_id', $customers, $field->customer_id, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione cliente','id'=>'customer_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$field->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales', 'id' => 'initials'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre')  !!}
		{!! Form::text('name',$field->name,['class' => 'form-control', 'required','placeholder' => 'Nombre'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('sport_id','Deporte')  !!}
		{!! Form::select('sport_id', $sports, $field->sport_id, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione deporte','id'=>'sport_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('availability_time_id','Dureación de la reserva')  !!}
		{!! Form::select('availability_time_id', $durations, $field->availability_time_id, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Duración de la reserva','id'=>'availability_time_id'])  !!}	
	</div>

	<div class="form-group">
		{!! Form::label('details','Detalles')  !!}
		{!! Form::textarea('details',$field->details,['class' => 'form-control', 'required','placeholder' => 'Detalles'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('escenario.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/fields/show.js') }}"></script>
@endsection
