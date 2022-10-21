@extends('layouts/master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
@endsection
@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Clientes</h3>
    </div>
</div>
<div class="row">
    <!--Formulario-->
    <div class="col-12 col-lg-4 order-lg-1">
        <div class="card">
            <div class="card-header">
                Agregar Cliente
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
                <form method="POST" action="{{route('clientes.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="rut_cliente">Rut Cliente:</label>
                        <input type="text" id="rut_cliente" name="rut_cliente" class="form-control @error('rut_cliente') is-invalid @enderror" value="{{old('rut_cliente')}}">
                    </div>
                    <div class="form-group">
                        <label for="nombreClie">Nombre Cliente:</label>
                        <input type="text" id="nombreClie" name="nombreClie" class="form-control @error('nombreClie') is-invalid @enderror" value="{{old('nombreClie')}}">
                    </div>
                    <div class="form-group">
                        <label for="apellidoClie">Apellido Cliente:</label>
                        <input type="text" id="apellidoClie" name="apellidoClie" class="form-control @error('apellidoClie') is-invalid @enderror" value="{{old('apellidoClie')}}">
                    </div>
                    <div class="form-group">
                        <label for="direccionClie">Direccion Cliente:</label>
                        <input type="text" id="direccionClie" name="direccionClie" class="form-control @error('direccionClie') is-invalid @enderror" value="{{old('direccionClie')}}">
                    </div>
                    <div class="form-group">
                        <label for="emailClie">Email Cliente:</label>
                        <input type="text" id="emailClie" name="emailClie" class="form-control @error('emailClie') is-invalid @enderror" value="{{old('emailClie')}}">
                    </div>
                    <div class="form-group">
                        <label for="telefonoClie">Telefono Cliente:</label>
                        <input type="text" id="telefonoClie" name="telefonoClie" class="form-control @error('telefonoClie') is-invalid @enderror" value="{{old('telefonoClie')}}">
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
                    <th class="d-none d-lg-table-cell">Rut</th>
                    <th class="d-none d-lg-table-cell">Nombre</th>
                    <th class="d-none d-lg-table-cell">Apellido</th>
                    <th class="d-none d-lg-table-cell">Direccion</th>
                    <th class="d-none d-lg-table-cell">Email</th>
                    <th class="d-none d-lg-table-cell">Telefono</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            @foreach ($clientes as $num=>$cliente)
                <tr>
                    <td>{{$num+1}}</td>
                    <td class="d-none d-lg-table-cell">{{$cliente->rut_cliente}}</td>
                    <td class="d-none d-lg-table-cell">{{$cliente->nombreClie}}</td>
                    <td class="d-none d-lg-table-cell">{{$cliente->apellidoClie}}</td>
                    <td class="d-none d-lg-table-cell">{{$cliente->direccionClie}}</td>
                    <td class="d-none d-lg-table-cell">{{$cliente->emailClie}}</td>
                    <td class="d-none d-lg-table-cell">{{$cliente->telefonoClie}}</td>
                    <td class="text-center" style="width:1rem">
                        <!--Borrar-->
                        <span data-toggle="tooltip" data-placement="top" title="Borrar Producto">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#productoBorrarModal{{$cliente->id}}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </span>
                        <!--Borrar-->
                    </td>
                    <td class="text-center" style="width:1rem">
                        <a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Cliente">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal Borrar Cliente-->
                <div class="modal fade" id="productoBorrarModal{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Cliente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                    ¿Desea borrar al cliente {{$cliente->nombreClie}}?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('clientes.destroy',$cliente->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Borrar Cliente</button>
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