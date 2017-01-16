@extends('shared.main')
@section('title','Administración/Usuarios')

@section('content')

	<a href="{{ route('usuario.create') }}" class="btn btn-primary">Crear</a>	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-condensed" cellspacing="0" width="100%">
			<thead>
		        <tr>
		        	<th>Email</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Rol</th>
					<th>Cliente</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
 				@foreach($users as $user)
					<tr>
						<td>{{ $user->email }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->last_name }}</td>
						<td>{{ $user->role_id}}</td>
						<td>{{ $user->customer_id }}</td>
						<td>								
							<a title="Ver" href="{{ route('usuario.show',$user->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('usuario.edit',$user->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('usuario.destroy',$user->id) }}" class="btn btn-danger btn-xs confirm">
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