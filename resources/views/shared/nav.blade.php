<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--li role="separator" class="divider"></li-->
            <li><a href="{{ route('tipoIdentificacion.index') }}">Tipos de identificación</a></li>
            <li><a href="{{ route('tipoZona.index') }}">Tipos de zona</a></li>
            <li><a href="{{ route('zona.index') }}">Zonas</a></li>
            <li><a href="{{ route('tipoTelefono.index') }}">Tipo de teléfonos</a></li>
            <li><a href="{{ route('tipoTelefono.index') }}">Teléfonos</a></li>
            <!--li role="separator" class="divider"></li-->                
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administración<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--li role="separator" class="divider"></li-->
            <li><a href="{{ route('cliente.index') }}">Clientes</a></li>
            <!--li role="separator" class="divider"></li-->                
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reservas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--li role="separator" class="divider"></li-->
            <li><a href="{{ route('tipoIdentificacion.index') }}">Tipos de identificación</a></li>
            <!--li role="separator" class="divider"></li-->                
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Torneos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--li role="separator" class="divider"></li-->
            <li><a href="{{ route('tipoIdentificacion.index') }}">Tipos de identificación</a></li>
            <!--li role="separator" class="divider"></li-->                
          </ul>
        </li>
      </ul>      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>