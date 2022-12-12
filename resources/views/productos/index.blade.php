@extends('layouts/master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
@endsection
@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Productos</h3>
    </div>
</div>
<div class="row">
    <!--Formulario-->
    <div class="col-12 col-lg-4 order-lg-1">
        <div class="card">
            <div class="card-header">
                Agregar Producto
            </div>
            <div class="card-body">
                {{-- Validacion --}}
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
                {{-- Validacion --}}
                <form method="POST" action="{{route('productos.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombreProd">Nombre Producto:</label>
                        <input type="text" id="nombreProd" name="nombreProd" class="form-control @error('nombreProd') is-invalid @enderror" value="{{old('nombreProd')}}">
                    </div>
                    <div class="form-group">
                        <label for="descripcionProd">Descripción:</label>
                        <input type="text" id="descripcionProd" name="descripcionProd" class="form-control" value="{{old('descripcionProd')}}">
                    </div>
                    <div class="form-group">
                        <label for="cantidadProd">Cantidad:</label>
                        <input type="number" id="cantidadProd" name="cantidadProd" class="form-control @error('cantidadProd') is-invalid @enderror" value="{{old('cantidadProd')}}" min="1" max="99">
                    </div>
                    <div class="form-group">
                        <label for="precioProd">Precio:</label>
                        <input type="number" id="precioProd" name="precioProd" class="form-control @error('precioProd') is-invalid @enderror" min="1" max="999999999">
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
                                <option value="{{$categoria->id}}">{{$categoria->nombreCat}}</option>
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
                    <th>ID</th>
                    <th class="d-none d-lg-table-cell">Producto</th>
                    <th class="d-none d-lg-table-cell">Descripción</th>
                    <th class="d-none d-lg-table-cell">Cantidad</th>
                    <th class="d-none d-lg-table-cell">Precio</th>
                    <th class="d-none d-lg-table-cell">Fecha</th>
                    <th class="d-none d-lg-table-cell">Categoria</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            @foreach ($productos as $num=>$producto)
                <tr>
                    <td>{{$num+1}}</td>
                    <td class="d-lg-none">
                        {{$producto->nombreProd}}  ({{$producto->cantidadProd}})<br>
                        {{$producto->precioProd}}, {{$producto->categoria!=null?$producto->categoria->nombreCat: 'Sin categoria'}}
                    </td>
                    <td class="d-none d-lg-table-cell">{{$producto->nombreProd}}</td>
                    <td class="d-none d-lg-table-cell">{{$producto->descripcionProd}}</td>
                    <td class="d-none d-lg-table-cell">{{$producto->cantidadProd}}</td>
                    <td class="d-none d-lg-table-cell">${{$producto->precioProd}}</td>
                    <td class="d-none d-lg-table-cell">{{$producto->fechaIngreso}}</td>
                    <td class="d-none d-lg-table-cell">{{$producto->categoria!=null?$producto->categoria->nombreCat: 'Sin categoria'}}</td>
                    <td class="text-center" style="width:1rem">
                        <!--Borrar-->
                        <span data-toggle="tooltip" data-placement="top" title="Borrar Producto">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#productoBorrarModal{{$producto->id}}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </span>
                        <!--Borrar-->
                    </td>
                    <td class="text-center" style="width:1rem">
                        <a href="{{route('productos.edit',$producto->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Producto">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal Borrar Producto-->
                <div class="modal fade" id="productoBorrarModal{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Producto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                    ¿Desea borrar el producto {{$producto->nombreProd}}?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('productos.destroy',$producto->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Borrar Producto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
            