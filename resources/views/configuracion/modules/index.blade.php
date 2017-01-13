@extends('shared.main')
@section('title','Configuración/Módulos')

@section('content')

	<a href="{{ route('modulo.create') }}" class="btn btn-primary">Crear</a>	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-condensed" cellspacing="0" width="100%">
			<thead>
		        <tr>
		        	<th>Nombre tabla</th>
					<th>Nombre módulo</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
 				@foreach($modules as $module)
					<tr>
						<td>{{ $module->table }}</td>
						<td>{{ $module->name }}</td>
						<td>								
							<a title="Ver" href="{{ route('modulo.show',$module->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('modulo.edit',$module->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('modulo.destroy',$module->id) }}" class="btn btn-danger btn-xs confirm">
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