@extends('shared.main')
@section('title','Configuración/Tipo identificación')

@section('content')

	<div class="row">
	  <div class="col-lg-6">
	    <div class="input-group">
	      <span class="input-group-btn">
	      </span>
	    </div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	  <div class="col-lg-6">
	  	{!! Form::open(['route' => 'tipoIdentificacion.index','method' => 'GET']) !!}
		    <div class="input-group">
		    	
			{!! Form::text('search',null,['class' => 'form-control', 'placeholder' => 'Buscar', 'aria-describedby' => 'buscar'])  !!}
		    <span class="input-group-btn">
		    	{!! Form::submit('Buscar',['class' => 'btn btn-default'])  !!}	
		    </span>

		    </div><!-- /input-group -->
		{!! Form::close() !!}
	  </div><!-- /.col-lg-6 -->
	</div><!-- /.row -->

	<hr>		
	<a href="{{ route('tipoIdentificacion.create') }}" class="btn btn-primary">Crear</a>

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<th>Iniciales</th>
				<th>Nombre</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				@foreach($types as $type)
					<tr>
						<td>{{ $type->initials }}</td>
						<td>{{ $type->name }}</td>
						<td>
							<a href="{{ route('tipoIdentificacion.edit',$type->id) }}" class="btn btn-warning separate_left">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a href="{{ route('tipoIdentificacion.destroy',$type->id) }}" onclick="return confirm('¿Desea eliminar el tipo de identificación?')" class="btn btn-danger separate_left">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

{{ $types->links() }}
@endsection