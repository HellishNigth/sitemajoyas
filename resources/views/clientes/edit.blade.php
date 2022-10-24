@extends('layouts.master')
@section('contenido-principal')
    <h3>Editar Cliente</h3>
    <hr>
    <div class="row">
    <!--Datos Producto-->
        <div class="col-2 d-none d-lg-block">
            <div class="card">
                <div class="card-header">Cliente </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Rut: </b>{{$cliente->rut_cliente}}</li>
                    <li class="list-group-item"><b>Nombre: </b>{{$cliente->nombreClie}}</li>
                    <li class="list-group-item"><b>Apellido: </b>{{$cliente->apellidoClie}}</li>
                    <li class="list-group-item"><b>Direccion: </b>{{$cliente->direccionClie}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$cliente->emailClie}}</li>
                    <li class="list-group-item"><b>Telefono: </b>{{$cliente->telefonoClie}}</li>
                </ul>
            </div>
        </div>


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
                    <form method="POST" action="{{route('clientes.update',$cliente->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="rut_cliente">Rut Cliente:</label>
                            <input type="text" id="rut_cliente" name="rut_cliente" class="form-control @error('rut_cliente') is-invalid @enderror" value="{{$cliente->rut_cliente}}">
                        </div>
                        <div class="form-group">
                            <label for="nombreClie">Nombre Cliente:</label>
                            <input type="text" id="nombreClie" name="nombreClie" class="form-control @error('nombreClie') is-invalid @enderror" value="{{$cliente->nombreClie}}">
                        </div>
                        <div class="form-group">
                            <label for="apellidoClie">Apellido Cliente:</label>
                            <input type="text" id="apellidoClie" name="apellidoClie" class="form-control @error('apellidoClie') is-invalid @enderror" value="{{$cliente->apellidoClie}}">
                        </div>
                        <div class="form-group">
                            <label for="direccionClie">Direccion Cliente:</label>
                            <input type="text" id="direccionClie" name="direccionClie" class="form-control @error('direccionClie') is-invalid @enderror" min="1" max="99" value="{{$cliente->direccionClie}}">
                        </div>
                        <div class="form-group">
                            <label for="emailClie">Email Cliente:</label>
                            <input type="text" id="emailClie" name="emailClie" class="form-control @error('emailClie') is-invalid @enderror" value="{{$cliente->emailClie}}">
                        </div>
                        <div class="form-group">
                            <label for="telefonoClie">Telefono Cliente:</label>
                            <input type="text" id="telefonoClie" name="telefonoClie" class="form-control @error('telefonoClie') is-invalid @enderror" value="{{$cliente->telefonoClie}}">
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
            <a href="{{route('clientes.index')}}" class="btn btn-info">Volver a Clientes</a>
        </div>
    </div>
@endsection