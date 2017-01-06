@extends('shared.main')
@section('title','Administración/Clientes/Crear')

@section('content')
{!! Form::open(['route' => 'cliente.store', 'method' => 'POST']) !!}

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('identification_type_id','Tipo identificación')  !!}
			{!! Form::select('identification_type_id', $identificationTypes, null, ['class' => 'form-control', 'required', 'placeholder' => 'Tipo identificación','id'=>'identification_type_id'])  !!}	
		</div>
		<div class="col-md-6">
			{!! Form::label('identification','Nro. identificación')  !!}
			{!! Form::text('identification',null,['class' => 'form-control', 'required','placeholder' => 'Nro. identificación','id'=>'identification'])  !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('name','Nombre')  !!}
			{!! Form::text('name',null,['class' => 'form-control', 'required','placeholder' => 'Nombre','id'=>'name'])  !!}
		</div>
		<div class="col-md-6">
			{!! Form::label('business_name','Razón social')  !!}
			{!! Form::text('business_name',null,['class' => 'form-control', 'required','placeholder' => 'Razón social','id'=>'business_name'])  !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('zone_id','Ciudad')  !!}
			{!! Form::select('zone_id', $zones, null, ['class' => 'form-control', 'required', 'placeholder' => 'Ciudad','id'=>'zone_id'])  !!}	
		</div>
		<div class="col-md-6">
			{!! Form::label('address','Dirección')  !!}
			{!! Form::text('address',null,['class' => 'form-control', 'required','placeholder' => 'Dirección','id'=>'address'])  !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('email','Email')  !!}
			{!! Form::email('email', null, ['class' => 'form-control','required','placeholder' => 'Email','id'=>'email' ]) !!}
		</div>
		<div class="col-md-6">		
			{!! Form::label('phone','Teléfono fijo')  !!}
			{!! Form::text('phone',null,['class' => 'form-control','placeholder' => 'Teléfono fijo','id'=>'phone'])  !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('cellPhone1','Celular 1')  !!}
			{!! Form::checkbox('cellPhone1', null)  !!}

			{!! Form::label('whatsApp1','¿WhatsApp?')  !!}	
			{!! Form::text('cellPhone1',null,['class' => 'form-control', 'required','placeholder' => 'Celular','id'=>'cellPhone1'])  !!}
		</div>
		<div class="col-md-6">			
			{!! Form::label('cellPhone2','Celular 2')  !!}

			{!! Form::checkbox('cellPhone2', null)  !!}
			{!! Form::label('whatsApp1','¿WhatsApp?')  !!}	

			{!! Form::text('cellPhone2',null,['class' => 'form-control','placeholder' => 'Celular','id'=>'cellPhone2'])  !!}
		</div>
	</div>	
		
	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('cliente.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/onlyTable.js') }}"></script>
	<script src="{{ asset('js/shared.js') }}"></script>
@endsection