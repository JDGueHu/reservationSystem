@extends('shared.main')
@section('title','Administración/Reservables/Ver') 

@section('warning')

@endsection

@section('content')

	<div class="form-group">
		{!! Form::label('customer_id','Cliente')  !!}
		{!! Form::select('customer_id', $customers, $generate_availability->customer_id, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione cliente','id'=>'customer_id'])  !!}	
	</div>

	<div class="form-group">
		@foreach($fields_customer as $field_customer)
			<h4 class="separador_short">
				<span class="label label-primary">
					<input type="checkbox" name="fields" id="{{ $field_customer->id }}"/>
					{{ $field_customer->name }}
				</span>
			</h4>
			<div class="form-group">
				<table id="example" class="table table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Día</th>
							<th>Franja horaria</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>	
						@for($i=0;$i<$availabilities_num;$i++)								
							@foreach($field_availabilities[$i] as $field_availability)
								@if($field_customer->id == $field_availability->field_id)
									<tr>
										<td>{{ $field_availability->name }}</td>
										<td>{{ $field_availability->ini_hour." - ".$field_availability->fin_hour}}</td>
										<td>{{ $field_availability->price }}</td>
									</tr>
								@endif
							@endforeach
						@endfor				
					</tbody>
				</table>
			</div>
		@endforeach
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('generarDisponibilidad.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<input type="hidden" name="fields_checked" value="{{ $fields_checked }}" id="fields_checked">

@endsection

@section('js')
<script src="{{ asset('js/generate_availabilities/show.js') }}"></script>
@endsection