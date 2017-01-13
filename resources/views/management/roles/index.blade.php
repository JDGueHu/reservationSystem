@extends('shared.main')
@section('title','Administración/Roles')

@section('content')

	<a href="{{ route('rol.create') }}" class="btn btn-primary">Crear</a>	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-condensed" cellspacing="0" width="100%">
			<thead>
		        <tr>
		        	<th>Iniciales</th>
					<th>Nombre</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
 				@foreach($roles as $rol)
					<tr>
						<td>{{ $rol->initials }}</td>
						<td>{{ $rol->name }}</td>
						<td>								
							<a title="Ver" href="{{ route('rol.show',$rol->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Permisos" href="{{ route('rol.permissions',$rol->id) }}" class="btn btn-success btn-xs">
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('rol.edit',$rol->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('rol.destroy',$rol->id) }}" class="btn btn-danger btn-xs confirm">
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