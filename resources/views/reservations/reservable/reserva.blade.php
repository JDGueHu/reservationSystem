@extends('shared.main')
@section('title','Reservas/Reservar')

@section('content')

{!! Form::open(['route' => 'zona.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('usuario_id','Usuario')  !!}
		{!! Form::select('usuario_id', $users, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione usuario','id'=>'usuario_id'])  !!}	
	</div>

	<hr>

	<h2>Va a reservar</h2>
	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('reservable.index',[]) }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Reservar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}

@endsection
