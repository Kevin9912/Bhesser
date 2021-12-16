<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Venta Semana</title>
</head>
<style type="text/css">
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        text-align: center;

    }

    table {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
    }

    th {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        text-align: center;
        background-color: black;
        color: blanchedalmond;
    }
</style>

<body>
    <div>
        <h1 style="text-align:center"> Reporte Semanal de Ventas </h1>
    <div>
        <h2 style="text-align:center;"> Tabla de Ventas de Productos en la semana </h2>
        <table style="width: 100%;">
        <thead>
            <tr>
                <th>Productos</th>
                <th> {{$Prim_1}} </th>
                <th> {{$Prim_2}} </th>
                <th> {{$Prim_3}} </th>
                <th> {{$Prim_4}} </th>
                <th> {{$Prim_5}} </th>
            </tr>
        </thead>
        <tbody>
            @foreach($Ventas as $Venta)
            @if($Venta->DateVenta == $Prim_1)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td> {{$Venta->cantidad}} </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if($Venta->DateVenta == $Prim_2)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td></td>
                <td> {{$Venta->cantidad}} </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if($Venta->DateVenta == $Prim_3)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td></td>
                <td></td>
                <td> {{$Venta->cantidad}} </td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if($Venta->DateVenta == $Prim_4)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td></td>
                <td></td>
                <td></td>
                <td> {{$Venta->cantidad}} </td>
                <td></td>
            </tr>
            @endif
            @if($Venta->DateVenta == $Prim_5)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td> {{$Venta->cantidad}} </td>
            </tr>
            @endif
            @endforeach
        </tbody>
        <tbody>
            <tr>
                <td> Total </td>
                <td colspan="5"> {{$Total_Producto}} </td>
            </tr>
        </tbody>
        </table>
    </div>
    <div>
        <h2 style="text-align:center;"> Tabla de Ganancias de Ventas en la semana </h2>
        <table style="width: 100%;">
        <thead>
            <tr>
                <th>Productos</th>
                <th> {{$Prim_1}} </th>
                <th> {{$Prim_2}} </th>
                <th> {{$Prim_3}} </th>
                <th> {{$Prim_4}} </th>
                <th> {{$Prim_5}} </th>
            </tr>
        </thead>
        <tbody>
            @foreach($Ventas as $Venta)
            @if($Venta->DateVenta == $Prim_1)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td> {{$Venta->monto}} </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if($Venta->DateVenta == $Prim_2)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td></td>
                <td> {{$Venta->monto}} </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if($Venta->DateVenta == $Prim_3)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td></td>
                <td></td>
                <td> {{$Venta->monto}} </td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if($Venta->DateVenta == $Prim_4)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td></td>
                <td></td>
                <td></td>
                <td> {{$Venta->monto}} </td>
                <td></td>
            </tr>
            @endif
            @if($Venta->DateVenta == $Prim_5)
            <tr>
                <td> {{$Venta->producto->Article}} </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td> {{$Venta->monto}} </td>
            </tr>
            @endif
            @endforeach
        </tbody>
        <tbody>
            <tr>
                <td> Total </td>
                <td colspan="5"> {{$Total_Precio}} </td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
</body>

</html>