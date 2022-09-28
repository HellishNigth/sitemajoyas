<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Campeonato de Fútbol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

</head>
<body style="background: linear-gradient(to bottom, #000141 0%, #E99493 120%);">
    <div class="container-fluid vh-100 d-flex flex-column justify-content-lg-center">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="row bg-light shadow-lg" style="height:25rem">
                    <!--Titulo y logo-->
                    <div class="col-lg-4 bg-light d-flex flex-column justify-content-center align-items-center text-center pt-3">
                        <div class="bg-light p-2 rounded mb-3">
                            <img class="img-redonda" src="{{ asset('images/logo.png') }}">
                        </div>
                        <h2 class="text-dark">Joyas Amaju</h2>
                        <small class="text-primary">Gracias por apoyar este emprendimiento</small>
                    </div>
                    <!--Titulo y logo-->

                    <!--Formulario-->
                    <div class="col-lg-8 bg-white d-flex flex-column justify-content-center py-3">
                        <h4>Inicio de Sesión</h4>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('usuarios.login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña:</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>
                                    <div class="text-right">
                                        <div class="row">
                                            <div class="col col-lg-3 offset-lg-9">
                                                <button type="submit" class="btn btn-success btn-block">Iniciar Sesión</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- Validacion --}}
                        @if ($errors->any())
                            <div class="alert alert-warning">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- Validacion --}}
                    </div>
                    <!--Formulario-->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>