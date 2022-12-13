@extends('layouts/master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}">
@endsection
@section('contenido-principal')
<div class="row" style="margin-bottom: 2rem">
    <div class="col">
        <h3>Sistema de Venta y Compra de Joyas</h3>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/productos.png') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Productos</h5>
                <div class="btn-group d-flex">
                    <a href="{{route('productos.index')}}" class="btn btn-outline-success">Ver</a>
                    <a href="{{route('productos.index')}}" class="btn btn-outline-success">Agregar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/categorias.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Categorías</h5>
                <div class="btn-group d-flex">
                    <a href="{{route('categorias.index')}}" class="btn btn-outline-success">Ver</a>
                    <a href="{{route('categorias.index')}}" class="btn btn-outline-success">Agregar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/clientes.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <div class="btn-group d-flex">
                    <a href="{{route('clientes.index')}}" class="btn btn-outline-success">Ver</a>
                    <a href="{{route('clientes.index')}}" class="btn btn-outline-success">Agregar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/proveedores.png') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Proveedores</h5>
                <div class="btn-group d-flex">
                    <a href="{{route('proveedores.index')}}" class="btn btn-outline-success">Ver</a>
                    <a href="{{route('proveedores.index')}}" class="btn btn-outline-success">Agregar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/venta.png') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Realizar una Venta</h5>
                <div class="btn-group d-flex">
                    <a href="{{route('ventas.index')}}" class="btn btn-outline-success">Agregar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/compra.png') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Ingresar Compra</h5>
                <div class="btn-group d-flex">
                    <a href="{{route('compras.index')}}" class="btn btn-outline-success">Agregar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   

