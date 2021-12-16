        @extends('master')
        @section('content')
        @include("regist_inventario")
        @include("delete_inventario")
            <h1 class="text-center text-white bg-primary"> Almacen </h1>
            <div class="col-12">
            <button class="btn btn-secondary mb-3" type="button" data-toggle="modal" data-target="#nuevo_inventario"  onclick="regInventario()"> Registrar </button>
            <a class="btn btn-secondary float-right" href="{{route('PDFINVENT')}}" target="_blank">  Reporte PDF </a>
                <table class="table table-light" id="tblUsuarios">
                    <thead class="thead-dark">
                        <tr>
                            <th>Articulo</th>
                            <th>Estatus</th>
                            <th>Dato de Entrada</th>
                            <th>Dato de Salida</th>
                            <th>Sucursal</th>
                            <th>Cantidad</th>
                            <th>Estado Fisico</th>
                            <th>Unitario</th>
                            <th>Precio Unitario</th>
                            <th>Precio Venta</th>
                            <th>Precio</th>
                            <th>Proveedor</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventarios as $inventario)
                        <tr>
                            <td>{{$inventario->Article}}</td>
                            @if ($inventario->status == 1)
                            <td><span class="badge badge-success"> Activo </span></td>
                            @else
                            <td><span class="badge badge-danger"> Inactivo </span></td>
                            @endif
                            <td>{{$inventario->date_in}}</td>
                            <td>{{$inventario->date_out}}</td>
                            <td>{{$inventario->office->business_name}}</td>
                            <td>{{$inventario->cantidad}}</td>
                            <td>{{$inventario->name}}</td>
                            <td>{{$inventario->unitario}}</td>
                            <td>{{$inventario->precio_unitario}}</td>
                            <td>{{$inventario->precio_venta}}</td>
                            <td>{{$inventario->precio}}</td>
                            <td>{{$inventario->proveedor->name}}</td>
                            <td><a class="btn btn-primary" type="button" href="inventario/edit/{{$inventario->id}}"> Editar </td>
                            <td><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#eliminar_inventario" onclick="modalDeleteInventario('{{$inventario->id}}')"> Eliminar </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
    