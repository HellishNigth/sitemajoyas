@extends('layouts/master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
@endsection
@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Ventas</h3>
    </div>
</div>
<div class="row">
    <!--Formulario-->
    <div class="col-12 col-lg-4 order-lg-1">
        <div class="card">
            <div class="card-header">
                Agregar Proveedor
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
                <form method="POST" action="{{route('ventas.store')}}" enctype="multipart/form-data">
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
                        <label for="cliente">Cliente:</label>
                        <select name="cliente" id="cliente" class="form-control @error('cliente') is-invalid @enderror">
                            @foreach ($clientes as $cliente )
                                <option value="{{$cliente->id}}">{{$cliente->nombreClie}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" id="cantidad" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror"  min="1" max="99">
                    </div>
                    <div class="form-group">
                        <label for="fechaVenta">Fecha Venta:</label>
                        <input type="date" id="fechaVenta" name="fechaVenta" class="form-control @error('fechaVenta') is-invalid @enderror">
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
                    <th class="d-none d-lg-table-cell">Cliente</th>
                    <th class="d-none d-lg-table-cell">Cantidad</th>
                    <th class="d-none d-lg-table-cell">Total</th>
                    <th class="d-none d-lg-table-cell">Fecha</th>
                    <th colspan="1">Acción</th>
                </tr>
            </thead>
            @foreach ($ventas as $num=>$venta)
                <tr>
                    <td>{{$num+1}}</td>
                    <td class="d-none d-lg-table-cell">{{$producto->nombreProd}}</td>
                    <td class="d-none d-lg-table-cell">{{$cliente->nombreClie}}  {{$cliente->apellidoClie}}</td>
                    <td class="d-none d-lg-table-cell">{{$venta->cantidad}}</td>
                    <td class="d-none d-lg-table-cell">{{$venta->totalVenta}}</td>
                    <td class="d-none d-lg-table-cell">{{$venta->fechaVenta}}</td>
                    <td class="text-center" style="width:1rem">
                        <!--Borrar-->
                        <span data-toggle="tooltip" data-placement="top" title="Borrar Venta">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ventaBorrarModal{{$venta->id}}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </span>
                        <!--Borrar-->
                    </td>
                </tr>
                <!-- Modal Borrar Venta-->
                <div class="modal fade" id="ventaBorrarModal{{$venta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Venta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                    ¿Desea borrar la venta?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('ventas.destroy',$venta->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Borrar Venta</button>
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
            