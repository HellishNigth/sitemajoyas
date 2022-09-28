@extends('layouts.master')
@section('contenido-principal')
    <h3>Editar Categoría</h3>
    <hr>
    <div class="row">
    <!--Datos Categoria-->
        <div class="col-2 d-none d-lg-block">
            <div class="card">
                <div class="card-header">Categoría </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nombre: </b>{{$categoria->nombreCat}}</li>
                </ul>
            </div>
        </div>
    <!--Datos Categoria-->

    <!--Formulario edicion-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Formulario de Edición</div>
                <div class="card-body">
                    <form method="POST" action="{{route('categorias.update',$categoria->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nombreCat">Nombre Categoría:</label>
                            <input type="text" id="nombreCat" name="nombreCat" class="form-control" value="{{$categoria->nombreCat}}">
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
            <a href="{{route('categorias.index')}}" class="btn btn-info">Volver a Categorías</a>
        </div>
    </div>
@endsection