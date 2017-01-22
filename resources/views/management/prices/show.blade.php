@extends('shared.main')
@section('title','Administraciòn/Precio/Ver')

@section('content')
{!! Form::model($price) !!}

	<div class="form-group">
		{!! Form::label('initials','Iniciales')  !!}
		{!! Form::text('initials',$price->initials,['class' => 'form-control', 'required','placeholder' => 'Iniciales','id' => 'initials'])  !!}
	</div>

	<div class="form-group">
		{!! Form::label('price','Precio')  !!}
		{!! Form::number('price',$price->price,['class' => 'form-control', 'min' => '0','required','placeholder' => 'Precio','id' => 'price'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('precio.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
	</div>

{!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('js/prices/show.js') }}"></script>
@endsection