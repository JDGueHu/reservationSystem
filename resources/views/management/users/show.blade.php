@extends('shared.main')
@section('title','Administración/Usuario/Ver')

@section('content')
{!! Form::open() !!}

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('name','Nombres')  !!}
			{!! Form::text('name',$user->name,['class' => 'form-control', 'required','placeholder' => 'Nombres','id'=>'name'])  !!}	
		</div>
		<div class="col-md-6">
			{!! Form::label('last_name','Apellidos')  !!}
			{!! Form::text('last_name',$user->last_name,['class' => 'form-control', 'required','placeholder' => 'Apellidos','id'=>'last_name'])  !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('email','Email')  !!}
			{!! Form::email('email', $user->email, ['class' => 'form-control','required','placeholder' => 'Email','id'=>'email' ]) !!}
		</div>
		<div class="col-md-6">
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
			{!! Form::label('role_id','Rol')  !!}
			{!! Form::select('role_id', $roles, $user->role_id, ['class' => 'form-control', 'required', 'placeholder' => 'Rol','id'=>'role_id'])  !!}	
		</div>
		<div class="col-md-6">		
			{!! Form::label('customer_id','Cliente')  !!}
			{!! Form::select('customer_id', $customers, $user->customer_id, ['class' => 'form-control', 'required', 'placeholder' => 'Cliente','id'=>'customer_id'])  !!}	
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
		<a style="text-decoration: none;" href="{{{ URL::route('usuario.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>

	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/onlyTable.js') }}"></script>
	<script src="{{ asset('js/users/show.js') }}"></script>

@endsection