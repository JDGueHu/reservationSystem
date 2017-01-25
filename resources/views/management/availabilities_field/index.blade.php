@extends('shared.main')
@section('title','Administración/Disponibilidades escenario')

@section('content')
	
	<a href="{{ route('disponibilidadEscenario.create',$field_id) }}" class="btn btn-primary">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Hora inicio</th>
					<th>Hora Fin</th>
					<th>Días</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($availabilities_field as $availability_field)
					<tr>
						<td>{{ $availability_field->ini_hour }}</td>
						<td>{{ $availability_field->fin_hour }}</td>
						<td></td>
						<td>
							<a title="Ver" href="{{ route('disponibilidadEscenario.show',[$field_id,$availability_field->id]) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('disponibilidadEscenario.edit',[$field_id,$availability_field->id]) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('disponibilidadEscenario.destroy',[$field_id,$availability_field->id]) }}" class="btn btn-danger btn-xs confirm">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('escenario.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>
@endsection

@section('js')
	<script src="{{ asset('js/table.js') }}"></script>
	<script src="{{ asset('js/shared.js') }}"></script>
@endsection