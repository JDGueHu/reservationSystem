@extends('shared.main')
@section('title','Administración/Clientes')

@section('content')

	<a href="{{ route('cliente.create') }}" class="btn btn-primary">Crear</a>	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-condensed" cellspacing="0" width="100%">
			<thead>
		        <tr>
					<th>Identificación</th>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>email</th>
					<th>business_name</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
 				@foreach($customers as $customer)
					<tr>
						<td>{{ $customer->identificaction }}</td>
						<td>{{ $customer->name }}</td>
						<td>{{ $customer->address }}</td>
						<td>{{ $customer->email }}</td>
						<td>{{ $customer->business_name }}</td>
						<td>								
							<a title="Consultar" href="" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="" class="btn btn-danger btn-xs confirm">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
				@endforeach 
			</tbody>
		</table>
	</div>

@endsection

@section('js')
	<script src="{{ asset('js/table.js') }}"></script>
	<script src="{{ asset('js/shared.js') }}"></script>
@endsection