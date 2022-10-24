<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Venta y Compra de Joyas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    @yield('hojas-estilo')
</head>
<body>
    <div class="container-fluid p-0">
        <!--Usuario-->
        <div class="row m-0" style="background-color: white; color: #5722e9">
            <div class="col-8">
                Bienvenido <b>{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</b>
            </div>
            <div class="col-3 text-right d-none d-lg-block">
                <small>Ultimo inicio de sesion: {{date('d-m-Y',strtotime(Auth::user()->ultimo_login))}} a las {{date('H:i:s',strtotime(Auth::user()->ultimo_login))}}</small>
            </div>
            <div class="col-1 text-right d-none d-lg-block">
                <a style="color: #5722e9" href="{{route('usuarios.logout')}}">Cerrar Sesión</a>
            </div>
        </div>
        <!--Usuario-->
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #5722e9">
            <img class="img-navbar" src="{{ asset('images/logo.png') }}">
            <a class="navbar-brand" href="{{route('home.index')}}">Joyas Amaju</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(Route::current()->getName()=='home.index') active @endif">
                  <a class="nav-link" href="{{route('home.index')}}">Inicio</a>
                </li>
                <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='productos') active @endif">
                  <a class="nav-link" href="{{route('productos.index')}}">Productos</a>
                </li>
                <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='categorias') active @endif">
                    <a class="nav-link" href="{{route('categorias.index')}}">Categorías</a>
                </li>
                <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='clientes') active @endif">
                  <a class="nav-link" href="{{route('clientes.index')}}">Clientes</a>
                </li>
                <li class="nav-item  @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='jugadores') active @endif">
                    <a class="nav-link" href="#">Ventas</a>
                </li>
                <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='partidos') active @endif">
                  <a class="nav-link" href="#">Compras</a>
              </li>
              <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='proveedores') active @endif">
                <a class="nav-link" href="{{route('proveedores.index')}}">Proveedores</a>
              </li>
              <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='partidos') active @endif">
                <a class="nav-link" href="#">Ajustar Stock</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Informes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Descargar Tabla de Posiciones</a>
                </div>
              </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configuración
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Cambiar Contraseña</a>
                    @if(Gate::allows('usuarios-listar'))
                    <a class="dropdown-item" href="{{route('usuarios.index')}}">Usuarios</a>
                    @endif
                    <a class="dropdown-item d-lg-none" href="{{route('usuarios.logout')}}">Cerrar Sesión</a>
                  </div>
                </li>
              </ul>
            </div>
        </nav>
        <!--Navbar-->
        <!--Contenido-->
        <div class="p-2">
            @yield('contenido-principal')
        </div>
        <!--Contenido-->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>