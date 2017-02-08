@extends('shared.main')
@section('title','Administración/Reservables/Crear')

@section('warning')
		<div class="alert alert-danger text-center" role="alert" style="padding: 0%">
			<p>Por favor <b>REVISE DETENIDAMENTE</b> la configuración de las disponibilidades de los escenarios antes de generar las reservas</p>
		</div>
@endsection

@section('content')

	<div class="form-group">
		{!! Form::label('customer_id','Cliente')  !!}
		{!! Form::select('customer_id', $customers, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione cliente','id'=>'customer_id'])  !!}	
	</div>

	<div class="form-group" id="contenedor">
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('generarDisponibilidad.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Generar',['class' => 'btn btn-primary','id' => 'storeButton'])  !!}
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">


@endsection

@section('js')
<script src="{{ asset('js/table.js') }}"></script>
<script src="{{ asset('js/generate_availabilities/create.js') }}"></script>
@endsection