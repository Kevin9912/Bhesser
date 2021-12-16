<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Venta Día</title>
</head>
<style type="text/css">
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        text-align: left;
        
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
        <h1 style="text-align:center"> Reporte Diario de Ventas </h1>
    <div>
        <h2 style="text-align:center;"> Tabla de Ventas del día <strong> {{\Carbon\Carbon::now()->format('d/m/Y')}} </strong> </h2>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th> Producto </th>
                    <th> Cantidad </th>
                    <th> Precio </th>
                </tr>
            </thead>
            <tbody>
                @foreach($Ventas as $Venta)
                <tr>
                    <td> {{$Venta->producto->Article}} </td>
                    <td> {{$Venta->cantidad}} </td>
                    <td> {{$Venta->monto}} </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th></th>
                    <th> Total </th>
                    <th> Total </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td> {{$Total_Producto}} </td>
                    <td> {{$Total_Precio}} </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>