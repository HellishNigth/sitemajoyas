@extends('layouts/master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
@endsection
@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Usuarios</h3>
    </div>
</div>
<div class="row">
    <!--Formulario-->
    <div class="col-12 col-lg-4 order-lg-1">
        <div class="card">
            <div class="card-header">
                Agregar Usuario
            </div>
            <div class="card-body">
                {{-- Errores --}}
                @if ($errors->any())
                    <div class="alert alert-warning">
                        <p>Por favor solucione los siguientes problemas:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- Errores --}}
                <form method="POST" action="{{route('usuarios.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <label for="password2">Repetir Contraseña:</label>
                        <input type="password" id="password2" name="password2" class="form-control @error('password2') is-invalid @enderror" value="{{old('password2')}}">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Rol:</label>
                        <select name="rol" id="rol" class="form-control">
                            @foreach ($roles as $rol)
                                <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                                <button type="reset" class="btn btn-warning btn-block">Cancelar</button>
                            </div>
                            <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                                <button type="submit" class="btn btn-info btn-block">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Formulario-->

    <!--Tabla-->
    <div class="col-12 col-lg-8 mt-1 mt-lg-0">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Ultimo Login</th>
                    <th>Rol</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            @foreach ($usuarios as $num=>$usuario)
                <tr>
                    <td>{{$num+1}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{date('d-m-Y H:i:s',strtotime($usuario->ultimo_login))}}</td>
                    <td>{{$usuario->rol->nombre}}</td>
                    <td>{{$usuario->activo?'Si':'No'}}</td>
                    
                    <td class="text-center" style="width:1rem">
                        @if(Auth::user()->id!=$usuario->id)
                        <form method="POST" action="{{route('usuarios.activar', $usuario->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="{{$usuario->activo?'Desactivar':'Activar'}} Usuario">
                                <i class="fas fa-user-{{$usuario->activo?'slash':'check'}}"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                
            @endforeach
        </table>
    </div>
    <!--Tabla-->                
</div>

@endsection
@section('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection
            