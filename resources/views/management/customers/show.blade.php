@extends('shared.main')
@section('title','Administración/Clientes/Ver')

@section('content')
{!! Form::open() !!}

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('identification_type_id','Tipo identificación')  !!}
			{!! Form::select('identification_type_id', $identificationTypes, $customer->identification_type_id, ['class' => 'form-control', 'required', 'placeholder' => 'Tipo identificación','id'=>'identification_type_id'])  !!}	
		</div>
		<div class="col-md-6">
			{!! Form::label('identification','Nro. identificación')  !!}
			{!! Form::text('identification',$customer->identification,['class' => 'form-control', 'required','placeholder' => 'Nro. identificación','id'=>'identification'])  !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('name','Nombre')  !!}
			{!! Form::text('name',$customer->name,['class' => 'form-control', 'required','placeholder' => 'Nombre','id'=>'name'])  !!}
		</div>
		<div class="col-md-6">
			{!! Form::label('business_name','Razón social')  !!}
			{!! Form::text('business_name',$customer->business_name,['class' => 'form-control', 'required','placeholder' => 'Razón social','id'=>'business_name'])  !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('zone_id','Ciudad')  !!}
			{!! Form::select('zone_id', $zones, $customer->zone_id, ['class' => 'form-control', 'required', 'placeholder' => 'Ciudad','id'=>'zone_id'])  !!}	
		</div>
		<div class="col-md-6">
			{!! Form::label('address','Dirección')  !!}
			{!! Form::text('address',$customer->address,['class' => 'form-control', 'required','placeholder' => 'Dirección','id'=>'address'])  !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('email','Email')  !!}
			{!! Form::email('email', $customer->email, ['class' => 'form-control','required','placeholder' => 'Email','id'=>'email' ]) !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('phones','Teléfonos')  !!}
		</div>
	</div>

	<div class="container">
		<div class="table-responsive">
			<table id="example" class="table table-condensed" cellspacing="0" width="100%">
				<thead>
			        <tr>
						<th>Tipo</th>
						<th>Número telefónico</th>
					</tr>
				</thead>
				<tbody>
	 				@foreach($phones as $phone)
						<tr>
							<td>{{ $phone->name }}</td>
							<td>{{ $phone->phone }}</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
		</div>
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('cliente.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>

	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/onlyTable.js') }}"></script>
	<script src="{{ asset('js/customers/show.js') }}"></script>

@endsection