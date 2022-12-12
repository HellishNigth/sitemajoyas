<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <h6>Joyas Amaju</h6>
    <br>
    <title>Reporte de Ventas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h3>Reporte de Ventas del mes de Abril</h3>
        <hr>

        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cliente</th>
                    <th>Cant.</th>
                    <th>Fecha Venta</th>
                    <th>Total Venta</th>
                    {{-- <th>Ganancias</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($reporteMensual as $reporte)
                    <tr>
                        <td>{{$reporte['nombreProd']}}</td>
                        <td>{{$reporte['nombreClie']}}</td>
                        <td class="text-center">{{$reporte['cantidad']}}</td>
                        <td>{{$reporte['fechaVenta']}}</td>
                        <td class="text-center">${{$reporte['totalVenta']}}</td>
                        {{-- <td class="text-center">${{$reporte['gananciasVenta']}}</td> --}}

                    </tr>
                @endforeach
            </tbody>
        </table><br>
        <h4>Ganancias: ${{$ganancias}}</h4>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>