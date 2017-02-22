@extends('shared.main')
@section('title','Administración/Usuario/Editar')

@section('content')
{!! Form::model($user,['route' => ['usuario.update',$user->id], 'method' => 'PUT']) !!}

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
			{!! Form::label('password','Contraseña')  !!}
			{{ Form::password('password', ['class' => 'form-control', 'required','placeholder' => 'Contraseña','id'=>'password']) }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">		
		</div>
		<div class="col-md-6">
			{!! Form::label('password2','Repetir ontraseña')  !!}
			{{ Form::password('password2', ['class' => 'form-control', 'required','placeholder' => 'Repetir ontraseña','id'=>'password2']) }}
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
			{!! Form::button('+',['class' => 'btn btn-success','data-toggle' => 'modal', 'data-target' => '#myModalNorm'])  !!}
		</div>
	</div>

	<div class="table-responsive">
		<table id="example" class="table table-condensed" cellspacing="0" width="100%">
			<thead>
		        <tr>
					<th>Tipo</th>
					<th>Número telefónico</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
 				@foreach($phones as $phone)
					<tr>
						<td>{{ $phone->name }}</td>
						<td>{{ $phone->phone }}</td>
						<td>
							<a title="Eliminar" onclick="phoneDelete({{ $phone->id }})" class="btn btn-danger btn-xs">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
				@endforeach 
			</tbody>
		</table>
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('usuario.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<input type="hidden" name="idView" value="{{ $idView }}" id="idView">
	<input type="hidden" name="registerId" value="{{ $user->id }}" id="registerId">
	<input type="hidden" name="owner" value="user" id="owner">

{!! Form::close() !!}

<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Agregar teléfono
                </h4>
            </div>

            <div class="modal-body"> 
	              <div class="form-group">
	              	{!! Form::label('phoneType','Tipo')  !!}
	 				{!! Form::select('phoneType', $phoneTypes, null, ['class' => 'form-control', 'required', 'placeholder' => 'Tipo','id'=>'phoneType'])  !!}	
	              </div>
	              <div class="form-group">
	                {!! Form::label('phone','Número telefónico')  !!}
	                {!! Form::text('phone',null,['class' => 'form-control', 'required','Número telefónico' => 'Dirección','id'=>'phone'])  !!}
	              </div>

                  <!-- Modal Footer -->
	              <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                <button type="button" id="ajaxButton" class="btn btn-primary phoneConfirm">Agregar</button>
	              </div>               
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
	<script src="{{ asset('js/onlyTable.js') }}"></script>
	<script src="{{ asset('js/shared.js') }}"></script>
@endsection