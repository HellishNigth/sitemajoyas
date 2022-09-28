@extends('layouts/master')

@section('contenido-principal')
    <h3>Productos de la categoria {{$categoria->nombreCat}}</h3>
    <div class="row">
        @if (count($categoria->productos)==0)
            <div class="col">
                <div class="alert alert-info">
                    Esta categoria no tiene productos registrados.
                </div>
            </div>
        @endif
        @foreach ($categoria->productos as $producto)
        <div class="col-12 col-md-4- col-lg-2">
            <div class="card">
                <img src="{{Storage::url($producto->imagen)}}" alt="{{$producto->nombreProd}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$producto->nombreProd}}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <b>Precio:</b> {{$producto->precioProd}}
                        </li>
                        <li class="list-group-item">
                            <b>Cantidad:</b> {{$producto->cantidadProd}}
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
        @endforeach
        
    </div>

    <div class="row mt-2">
        <div class="col">
            <a href="{{route('categorias.index')}}" class="btn btn-info">Volver a Categorías</a>
        </div>
    </div>
@endsection