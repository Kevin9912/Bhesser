<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Inventario</title>
</head>

<style type="text/css">
    div {
        border: 1px solid black;
        text-align: center;
    }
</style>


<body>
    <div class="titulo">
        <h1 style="text-align:center"> Reporte de Almacen </h1>
        <div>
            <h2 style="text-align:center"> Reporte de estado del Almacen </h2>
            @foreach($inventarios as $inventario)
            <div>
                <h2> Producto: </h2>
                <div> {{$inventario->Article}} </div>
            </div>
            <div>
                <h2> Fecha de Entrada: </h2>
                <div> {{$inventario->date_in}} </div>
            </div>
            @foreach($ventas as $venta)
            @if($venta->id_inventario == $inventario->id)
            <div>
                <h2> Cantidad Inicial: </h2>
                <div> {{$venta->total + $inventario->cantidad}} </div>
            </div>
            <div>
                <h2> Cantidad Vendida: </h2>
                <div> {{$venta->total}} </div>
            </div>
            @endif
            @endforeach
            <div>
                <h2> Cantidad en Existencia: </h2>
                <div> {{$inventario->cantidad}} </div>
            </div>

            <div>
                <h2> Fecha de Salida: </h2>
                <div> {{$inventario->date_out}} </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>