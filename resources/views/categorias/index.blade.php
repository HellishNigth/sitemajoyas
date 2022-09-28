@extends('layouts/master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
@endsection
@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Categorías</h3>
    </div>
</div>
<div class="row">
    <!--Formulario-->
    <div class="col-12 col-lg-4 order-lg-1">
        <div class="card">
            <div class="card-header">
                Agregar Categoría
            </div>
            <div class="card-body">
                {{-- Errores --}}
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
                {{-- Errores --}}
                <form method="POST" action="{{route('categorias.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nombreCat">Nombre Categoría:</label>
                        <input type="text" id="nombreCat" name="nombreCat" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombreCat')}}">
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
                    <th>Categoria</th>
                    <th>Cant. Productos</th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            @foreach ($categorias as $num=>$categoria)
                <tr>
                    <td>{{$num+1}}</td>
                    <td>
                        {{$categoria->nombreCat}} <span class="d-lg-none">({{count($categoria->productos)}})</span>
                    </td>
                    <td class="d-none d-lg-table-cell">{{count($categoria->productos)}}</td>
                    <td class="text-center" style="width:1rem">
                        <!--Borrar-->
                        <span data-toggle="tooltip" data-placement="top" title="Borrar categoria">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#equipoBorrarModal{{$categoria->id}}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </span>
                        {{-- <form method="POST" action="{{route('equipos.destroy',$equipo->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar Equipo"><i class="far fa-trash-alt"></i></button>
                        </form> --}}
                        {{-- <a href="#" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar Equipo">
                            <i class="far fa-trash-alt"></i>
                        </a> --}}
                        <!--Borrar-->
                    </td>
                    <td class="text-center" style="width:1rem">
                        <a href="{{route('categorias.edit',$categoria->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Categoria">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td class="text-center" style="width:1rem">
                        <a href="{{route('categorias.show',$categoria->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ver Productos">
                            <i class="fas fa-user-friends"></i>
                        </a>
                    </td>
                </tr>

                <!-- Modal Borrar Equipo-->
                <div class="modal fade" id="equipoBorrarModal{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Categoria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                    ¿Desea borrar la categoria {{$categoria->nombreCat}}?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('categorias.destroy',$categoria->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Borrar Categoría</button>
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
            