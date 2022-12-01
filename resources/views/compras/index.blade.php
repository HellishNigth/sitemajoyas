@extends('layouts/master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
@endsection
@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Compras</h3>
    </div>
</div>
<div class="row">
    <!--Formulario-->
    <div class="col-12 col-lg-4 order-lg-1">
        <div class="card">
            <div class="card-header">
                Agregar Compra
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
                <form method="POST" action="{{route('compras.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="producto">Producto:</label>
                        <select name="producto" id="producto" class="form-control @error('producto') is-invalid @enderror">
                            @foreach ($productos as $producto )
                                <option value="{{$producto->id}}">{{$producto->nombreProd}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="proveedor">Proveedor:</label>
                        <select name="proveedor" id="proveedor" class="form-control @error('proveedor') is-invalid @enderror">
                            @foreach ($proveedores as $proveedor )
                                <option value="{{$proveedor->id}}">{{$proveedor->nombreProv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" id="cantidad" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror"  min="1" max="99">
                    </div>
                    <div class="form-group">
                        <label for="fechaCompra">Fecha Compra:</label>
                        <input type="date" id="fechaCompra" name="fechaCompra" class="form-control @error('fechaCompra') is-invalid @enderror">
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
                    <th class="d-none d-lg-table-cell">Proveedor</th>
                    <th class="d-none d-lg-table-cell">Cantidad</th>
                    <th class="d-none d-lg-table-cell">Total</th>
                    <th class="d-none d-lg-table-cell">Fecha</th>
                    <th colspan="1">Acción</th>
                </tr>
            </thead>
            @foreach ($compras as $num=>$compra)
                <tr>
                    <td>{{$num+1}}</td>
                    <td class="d-none d-lg-table-cell">{{$compra->productos->first()!=null?$compra->productos->first()->nombreProd:'Producto Eliminado'}}</td>
                    <td class="d-none d-lg-table-cell">{{$compra->proveedor!=null?$compra->proveedor->nombreProv. ' ' .$compra->proveedor->apellidoProv:'Proveedor Eliminado'}}</td>
                    <td class="d-none d-lg-table-cell">{{$compra->cantidad}}</td>
                    <td class="d-none d-lg-table-cell">{{$compra->totalCompra}}</td>
                    <td class="d-none d-lg-table-cell">{{$compra->fechaCompra}}</td>
                    <td class="text-center" style="width:1rem">
                        <!--Borrar-->
                        <span data-toggle="tooltip" data-placement="top" title="Borrar Compra">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ventaBorrarModal{{$compra->id}}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </span>
                        <!--Borrar-->
                    </td>
                </tr>
                <!-- Modal Borrar Compra-->
                <div class="modal fade" id="ventaBorrarModal{{$compra->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Compra</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                    ¿Desea borrar la compra?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('compras.destroy',$compra->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Borrar Compra</button>
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
            