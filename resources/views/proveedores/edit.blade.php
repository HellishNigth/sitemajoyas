@extends('layouts.master')
@section('contenido-principal')
    <h3>Editar Proveedor</h3>
    <hr>
    <div class="row">
    <!--Datos Proveedor-->
        <div class="col-2 d-none d-lg-block">
            <div class="card">
                <div class="card-header">Proveedor </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>RUT: </b>{{$proveedor->rut_proveedor}}</li>
                    <li class="list-group-item"><b>Nombre: </b>{{$proveedor->nombreProv}}</li>
                    <li class="list-group-item"><b>Apellido: </b>{{$proveedor->apellidoProv}}</li>
                    <li class="list-group-item"><b>Dirección: </b>{{$proveedor->direccionProv}}</li>
                    <li class="list-group-item"><b>Correo: </b>{{$proveedor->emailProv}}</li>
                    <li class="list-group-item"><b>Teléfono: </b>{{$proveedor->telefonoProv}}</li>

                </ul>
            </div>
        </div>
    <!--Datos Proveedor-->

    <!--Formulario edicion-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Formulario de Edición</div>
                <div class="card-body">
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
                    <form method="POST" action="{{route('proveedores.update',$proveedor->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="rut_proveedor">RUT Proveedor:</label>
                            <input type="text" id="rut_proveedor" name="rut_proveedor" class="form-control @error('rut_proveedor') is-invalid @enderror" value="{{$proveedor->rut_proveedor}}">
                        </div>
                        <div class="form-group">
                            <label for="nombreProv">Nombre Proveedor:</label>
                            <input type="text" id="nombreProv" name="nombreProv" class="form-control @error('nombreProv') is-invalid @enderror" value="{{$proveedor->nombreProv}}">
                        </div>
                        <div class="form-group">
                            <label for="apellidoProv">Apellido Proveedor:</label>
                            <input type="text" id="apellidoProv" name="apellidoProv" class="form-control @error('apellidoProv') is-invalid @enderror" value="{{$proveedor->apellidoProv}}">
                        </div>
                        <div class="form-group">
                            <label for="direccionProv">Dirección:</label>
                            <input type="text" id="direccionProv" name="direccionProv" class="form-control @error('direccionProv') is-invalid @enderror" value="{{$proveedor->direccionProv}}">
                        </div>
                        <div class="form-group">
                            <label for="emailProv">Correo Electrónico:</label>
                            <input type="text" id="emailProv" name="emailProv" class="form-control @error('emailProv') is-invalid @enderror" value="{{$proveedor->emailProv}}">
                        </div>
                        <div class="form-group">
                            <label for="telefonoProv">Teléfono:</label>
                            <input type="text" id="telefonoProv" name="telefonoProv" class="form-control @error('telefonoProv') is-invalid @enderror" value="{{$proveedor->telefonoProv}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                                    <button type="reset" class="btn btn-warning btn-block">Cancelar</button>
                                </div>
                                <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                                    <button type="submit" class="btn btn-info btn-block">Editar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!--Formulario edicion-->
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('proveedores.index')}}" class="btn btn-info">Volver a Proveedores</a>
        </div>
    </div>
@endsection