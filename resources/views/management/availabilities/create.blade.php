@extends('shared.main')
@section('title','Administración/Disponibilidad/Crear')

@section('warning')
		<div class="alert alert-danger text-center" role="alert">
			<p>Por favor <b>REVISE DETENIDAMENTE</b> la configuración de las disponibilidades de los escenarios antes de generar las reservas</p>
		</div>
@endsection

@section('content')
{!! Form::open(['route' => 'disponibilidad.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('customer_id','Cliente')  !!}
		{!! Form::select('customer_id', $customers, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione cliente','id'=>'customer_id'])  !!}	
	</div>

	<div class="form-group" id="contenedor">
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('disponibilidad.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Generar',['class' => 'btn btn-primary'])  !!}
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

{!! Form::close() !!}


@endsection

@section('js')
<script src="{{ asset('js/availabilities/create.js') }}"></script>
@endsection