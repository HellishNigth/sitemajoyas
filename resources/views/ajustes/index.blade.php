@extends('layouts/master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
@endsection
@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Ajustar Stock</h3>
    </div>
</div>
<div class="row">
    <!--Formulario-->
    <div class="col-12 col-lg-4 order-lg-1">
        <div class="card">
            <div class="card-header">
                Agregar Ajuste
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
                <form method="POST" action="{{route('ajustes.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="producto_id">Producto:</label>
                        <select name="producto_id" id="producto_id" class="form-control @error('producto_id') is-invalid @enderror">
                            @foreach ($productos as $producto )
                                <option value="{{$producto->id}}">{{$producto->nombreProd}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipoAjuste">Tipo de Ajuste:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="tipo-aumento" name="tipoAjuste" value="Aumento" checked>
                                <label class="form-check-label" for="tipo-aumento">Aumento</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="tipo-disminucion" name="tipoAjuste" value="Disminucion">
                                <label class="form-check-label" for="tipo-disminucion">Disminución</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="motivo">Motivo:</label>
                        <input type="text" id="motivo" name="motivo" class="form-control @error('motivo') is-invalid @enderror" value="{{old('motivo')}}">
                    </div>
                    <div class="form-group">
                        <label for="cantidadAjuste">Cantidad:</label>
                        <input type="number" id="cantidadAjuste" name="cantidadAjuste" class="form-control @error('cantidadAjuste') is-invalid @enderror"  min="1" max="99">
                    </div>
                    <div class="form-group">
                        <label for="fechaAjuste">Fecha Ajuste:</label>
                        <input type="date" id="fechaAjuste" name="fechaAjuste" class="form-control @error('fechaAjuste') is-invalid @enderror">
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
        <table data-toggle="table" data-pagination="true" data-page-size="10" data-search="true" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th data-sortable="true">ID</th>
                    <th data-sortable="true" class="d-none d-lg-table-cell">Producto Ajustado</th>
                    <th data-sortable="true" class="d-none d-lg-table-cell">Tipo de Ajuste</th>
                    <th class="d-none d-lg-table-cell">Motivo</th>
                    <th class="d-none d-lg-table-cell">Cantidad</th>
                    <th data-sortable="true" class="d-none d-lg-table-cell">Fecha Ajuste</th>
                    <th colspan="1">Acción</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($ajustes as $num=>$ajuste)
                <tr>
                    <td>{{$num+1}}</td>
                    <td class="d-none d-lg-table-cell">{{$ajuste->producto!=null?$ajuste->producto->nombreProd: 'Producto Eliminado'}}</td>
                    <td class="d-none d-lg-table-cell">{{$ajuste->tipoAjuste}}</td>
                    <td class="d-none d-lg-table-cell">{{$ajuste->motivo}}</td>
                    <td class="d-none d-lg-table-cell">{{$ajuste->cantidadAjuste}}</td>
                    <td class="d-none d-lg-table-cell">{{$ajuste->fechaAjuste}}</td>
                    <td class="text-center" style="width:1rem">
                        <!--Borrar-->
                        <span data-toggle="tooltip" data-placement="top" title="Borrar Ajuste">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ajusteBorrarModal{{$ajuste->id}}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </span>
                        <!--Borrar-->
                    </td>
                </tr>
                <!-- Modal Borrar Ajuste-->
                <div class="modal fade" id="ajusteBorrarModal{{$ajuste->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Ajuste</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                    ¿Desea borrar el ajuste?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('ajustes.destroy',$ajuste->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Borrar Ajuste</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
        </table>
    </div>
    <!--Tabla-->                
</div>
@endsection
@section('scripts')
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script src="{{asset('js/bootstrap-table-es-CL.js')}}"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection
            