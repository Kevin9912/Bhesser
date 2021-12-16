@extends('master')
@section('content')
@include("close_caja")
@if(!is_null($caja))
<h1 class="text-center text-white bg-primary"> Ventas </h1>
<div class="col-12">
    <button class="btn btn-danger mb-3 float-right" type="button" data-toggle="modal" data-target="#cerrar_caja" onclick="modalclosecaja('{{$caja->id}}')"> Cerrar Caja </button>
    <form action="" method="post">
        <div class="row">

            <div class="col-md-6">
                <label for="caja">Nombre del Cajero</label>
                <input class="form-control mb-2" disabled type="text" name="" id="" value="{{$caja->usuario->user_name}}">
            </div>

            <div class="col-md-6">
                <label for="producto">Producto</label>
                <input class="form-control" type="text" name="" placeholder="Ingrese el nombre del producto" id="nameproduct">
                <button onclick="searchProducts()" type="button" class="btn btn-primary mb-1 float-righ"><i class="fas fa-search"></i></button>
            </div>
            <div class="col-md-12">
                <table class="table table-hovered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="productos">
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <table class="table table-light" id="tblVentas">
        <thead class="thead-dark">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Precio Total</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th colspan="3"></th>
                <th id="preciototal">0.00</th>
                <th colspan="1"></th>
            </tr>
        </tfoot>
    </table>
    <button class="btn btn-danger mb-3 float-right" onclick="saveSale(this)" type="button"> Registrar </button>
</div>
@else
<h1 class="text-center text-white bg-primary"> Apertura de Caja </h1>
<div class="col-12">
    <form action="{{route('saveBox')}}" method="GET">
        <div class="class row">

            <div class="col-md-6">
                <label for="Monto_apertura">Monto de Apertura</label>
                <input id="Monto_apertura" class="form-control mb-2" type="text" name="monto_apertura" placeholder="Ingrese el Monto de Apertura">
            </div>

            <div class="col-md-6">
                <label for="caja">Nombre del Cajero</label>
                <input class="form-control mb-2" disabled type="text" name="" id="" value="{{$perfil->user_name}}">
            </div>

        </div>

        <button class="btn btn-danger mb-3 float-right" type="submit"> Registrar </button>
        <a class="btn btn-primary" href="{{route('vista')}}">  Reportes Graficós </a>
        <a class="btn btn-secondary" href="{{route('PDFVENTADIA')}}" target="_blank">  Reporte del día PDF </a>
        <a class="btn btn-secondary" href="{{route('PDFVENTASEM')}}" target="_blank">  Reporte de la semana PDF </a>

        @if($errors->any())
        <div class="text-center" style="color:#a85757; border: 1px solid #a85757; padding: 10px; border-radius: 10px; margin: auto;">{{$errors->first()}}</span></div>
        @endif
    </form>
</div>
@endif
<main>
    <div class="container-fluid">
    </div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; <a href="https://www.facebook.com/Bhesser-Consulting-108502741422926" target="_blank" rel="noopener noreferrer"> Visita Nuestra Página de Facebook </a> <?php echo date("Y"); ?> </div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
@endsection('content')