@extends('layouts.app')

@section('content')
{!! Form::open() !!}
 
<div class="row">
     <div class="col-md-6 col-md-offset-3"> 
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title bold"><b>Registro de usuario</b></h3>
          </div>
          <div class="panel-body">
            {!! Form::open() !!}

                <div class="row">
                    <div class="col-md-4"><label for="name">Nombres</label></div>
                    <div class="col-md-8">                  
                        <div class="input-group">                 
                            <span for="name" class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombres" aria-describedby="basic-addon1">
                        </div>
                    </div>        
                </div>

                <div class="row">
                    <div class="col-md-4"><label for="last_name">Apellidos</label></div>
                    <div class="col-md-8">                  
                        <div class="input-group">                 
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellidos" aria-describedby="basic-addon1">
                        </div>
                    </div>        
                </div>

                <div class="row">
                    <div class="col-md-4"><label for="email">Email</label></div>
                    <div class="col-md-8">                  
                        <div class="input-group">                 
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@ejemplo.com" aria-describedby="basic-addon1">
                        </div>
                    </div>        
                </div>

                <div class="row">
                    <div class="col-md-4"><label for="password">Contraseña</label></div>
                    <div class="col-md-8">                  
                        <div class="input-group">                 
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="password" id="password" class="form-control" placeholder="********" aria-describedby="basic-addon1">
                        </div>
                    </div>        
                </div>
            
                <div class="row">
                    <div class="col-md-4"><label for="password2">Repetir Contraseña</label></div>
                    <div class="col-md-8">                  
                        <div class="input-group">                 
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="password2" id="password2" class="form-control" placeholder="********" aria-describedby="basic-addon1">
                        </div>
                    </div>        
                </div>

                <div class="row">
                    <div class="col-md-4"><label for="Captcha">Captcha</label></div>
                    <div class="col-md-8">                  
                        <div class="input-group">                 
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="Captcha" id="Captcha" class="form-control" placeholder="********" aria-describedby="basic-addon1">
                        </div>
                    </div>        
                </div>

                <div class="form-group">
                        <a style="text-decoration: none;" href="{{{ URL::route('login') }}}">
                            {!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
                        </a>
                    {!! Form::submit('Registrarse',['class' => 'btn btn-primary'])  !!}
                </div>

            {!! Form::close() !!}
          </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection


