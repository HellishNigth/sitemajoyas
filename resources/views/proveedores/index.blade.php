@extends('layouts/master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
@endsection
@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Proveedores</h3>
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
                <form method="POST" action="{{route('proveedores.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="rut_proveedor">RUT Proveedor:</label>
                        <input type="text" id="rut_proveedor" name="rut_proveedor" class="form-control @error('rut_proveedor') is-invalid @enderror" value="{{old('rut_proveedor')}}">
                    </div>
                    <div class="form-group">
                        <label for="nombreProv">Nombre Proveedor:</label>
                        <input type="text" id="nombreProv" name="nombreProv" class="form-control @error('nombreProv') is-invalid @enderror" value="{{old('nombreProv')}}">
                    </div>
                    <div class="form-group">
                        <label for="apellidoProv">Apellido Proveedor:</label>
                        <input type="text" id="apellidoProv" name="apellidoProv" class="form-control @error('apellidoProv') is-invalid @enderror" value="{{old('apellidoProv')}}">
                    </div>
                    <div class="form-group">
                        <label for="direccionProv">Dirección:</label>
                        <input type="text" id="direccionProv" name="direccionProv" class="form-control @error('direccionProv') is-invalid @enderror" value="{{old('direccionProv')}}">
                    </div>
                    <div class="form-group">
                        <label for="emailProv">Correo Electrónico:</label>
                        <input type="text" id="emailProv" name="emailProv" class="form-control @error('emailProv') is-invalid @enderror" value="{{old('emailProv')}}">
                    </div>
                    <div class="form-group">
                        <label for="telefonoProv">Teléfono:</label>
                        <input type="text" id="telefonoProv" name="telefonoProv" class="form-control @error('telefonoProv') is-invalid @enderror" value="{{old('telefonoProv')}}">
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
                    <th class="d-none d-lg-table-cell">RUT</th>
                    <th class="d-none d-lg-table-cell">Nombre</th>
                    <th class="d-none d-lg-table-cell">Apellido</th>
                    <th class="d-none d-lg-table-cell">Dirección</th>
                    <th class="d-none d-lg-table-cell">Email</th>
                    <th class="d-none d-lg-table-cell">Teléfono</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            @foreach ($proveedores as $num=>$proveedor)
                <tr>
                    <td>{{$num+1}}</td>
                    <td class="d-lg-none">
                        {{$proveedor->nombreProv}}  {{$proveedor->apellidoProv}}<br>
                        {{$proveedor->direccionProv}}, {{$proveedor->telefonoProv}}
                    </td>
                    <td class="d-none d-lg-table-cell">{{$proveedor->rut_proveedor}}</td>
                    <td class="d-none d-lg-table-cell">{{$proveedor->nombreProv}}</td>
                    <td class="d-none d-lg-table-cell">{{$proveedor->apellidoProv}}</td>
                    <td class="d-none d-lg-table-cell">{{$proveedor->direccionProv}}</td>
                    <td class="d-none d-lg-table-cell">{{$proveedor->emailProv}}</td>
                    <td class="d-none d-lg-table-cell">{{$proveedor->telefonoProv}}</td>
                    <td class="text-center" style="width:1rem">
                        <!--Borrar-->
                        <span data-toggle="tooltip" data-placement="top" title="Borrar Proveedor">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#proveedorBorrarModal{{$proveedor->id}}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </span>
                        <!--Borrar-->
                    </td>
                    <td class="text-center" style="width:1rem">
                        <a href="{{route('proveedores.edit',$proveedor->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Proveedor">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal Borrar Proveedor-->
                <div class="modal fade" id="proveedorBorrarModal{{$proveedor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Proveedor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                    ¿Desea borrar el proveedor {{$proveedor->nombreProv}}?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('proveedores.destroy',$proveedor->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Borrar Proveedor</button>
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
            