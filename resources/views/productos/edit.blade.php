@extends('layouts.master')
@section('contenido-principal')
    <h3>Editar Producto de Categoría {{$producto->categoria!=null?$producto->categoria->nombreCat: 'Sin Categoria'}}</h3>
    <hr>
    <div class="row">
    <!--Datos Producto-->
        <div class="col-2 d-none d-lg-block">
            <div class="card">
                <div class="card-header">Producto </div>
                <img src="{{Storage::url($producto->imagen)}}" alt="{{$producto->nombreProd}}" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nombre: </b>{{$producto->nombreProd}}</li>
                    <li class="list-group-item"><b>Precio: </b>{{$producto->precioProd}}</li>
                    <li class="list-group-item"><b>Categoría: </b>{{$producto->categoria!=null?$producto->categoria->nombreCat: 'Sin categoria'}}</li>
                </ul>
            </div>
        </div>
    <!--Datos Jugador-->

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
                    <form method="POST" action="{{route('productos.update',$producto->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nombreProd">Nombre Producto:</label>
                            <input type="text" id="nombreProd" name="nombreProd" class="form-control @error('nombreProd') is-invalid @enderror" value="{{$producto->nombreProd}}">
                        </div>
                        <div class="form-group">
                            <label for="descripcionProd">Descripción:</label>
                            <input type="text" id="descripcionProd" name="descripcionProd" class="form-control" value="{{$producto->descripcionProd}}">
                        </div>
                        <div class="form-group">
                            <label for="cantidadProd">Cantidad:</label>
                            <input type="number" id="cantidadProd" name="cantidadProd" class="form-control @error('cantidadProd') is-invalid @enderror" min="1" max="99" value="{{$producto->cantidadProd}}">
                        </div>
                        <div class="form-group">
                            <label for="precioProd">Precio:</label>
                            <input type="number" id="precioProd" name="precioProd" class="form-control @error('precioProd') is-invalid @enderror" min="1" max="999999999" value="{{$producto->precioProd}}">
                        </div>
                        <div class="form-group">
                            <label for="fechaIngreso">Fecha Ingreso:</label>
                            <input type="date" id="fechaIngreso" name="fechaIngreso" class="form-control @error('fechaIngreso') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="imagenProd">Imagen</label>
                            <input type="file" id="imagenProd" name="imagenProd" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select class="form-control" name="categoria" id="categoria">
                                @foreach ($categorias as $categoria )
                                    <option value="{{$categoria->id}}" @if($producto->categoria_id==$categoria->id) selected="selected" @endif>{{$categoria->nombreCat}}</option>
                                @endforeach
                            </select>
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
            <a href="{{route('productos.index')}}" class="btn btn-info">Volver a Productos</a>
        </div>
    </div>
@endsection