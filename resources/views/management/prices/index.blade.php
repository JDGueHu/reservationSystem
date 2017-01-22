@extends('shared.main')
@section('title','Administración/Precios')

@section('content')
	
	<a href="{{ route('precio.create') }}" class="btn btn-primary">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Iniciales</th>
					<th>Nombre</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($prices as $price)
					<tr>
						<td>{{ $price->initials }}</td>
						<td>{{ $price->price }}</td>
						<td>
							<a title="Ver" href="{{ route('precio.show',$price->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" href="{{ route('precio.edit',$price->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Eliminar" href="{{ route('precio.destroy',$price->id) }}" class="btn btn-danger btn-xs confirm">
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