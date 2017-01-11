@extends('shared.main')
@section('title','Administración/Clientes/Editar')

@section('content')
{!! Form::model($customer,['route' => ['cliente.update',$customer->id], 'method' => 'PUT']) !!}

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
		<a style="text-decoration: none;" href="{{{ URL::route('cliente.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<input type="hidden" name="idView" value="{{ $idView }}" id="idView">
	<input type="hidden" name="customerId" value="{{ $customer->id }}" id="customerId">

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
            
            <!-- Modal Body -->

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