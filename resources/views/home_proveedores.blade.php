
            @extends('master')
            @section('content')
            @include("regist_proveedor")
            @include("delete_proveedores")
            <h1 class="text-center text-white bg-primary"> Proveedores </h1>
            <div class="col-12">
                <button class="btn btn-secondary mb-3" type="button" data-toggle="modal" data-target="#nuevo_proveedor" onclick="regProveedor()"> Registrar </button>
                <table class="table table-light" id="tblUsuarios">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre del Proveedor</th>
                            <th>status</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Relación</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{$proveedor->name}}</td>
                            @if ($proveedor->is_active == 1)
                            <td><span class="badge badge-success"> Activo </span></td>
                            @else
                            <td><span class="badge badge-danger"> Inactivo </span></td>
                            @endif
                            <td>{{$proveedor->created}}</td>
                            <td>{{$proveedor->date_relation}}</td>
                            <td><a class="btn btn-primary" type="button" href="proveedor/edit/{{$proveedor->id}}"> Editar </a></td>
                            <td><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#eliminar_proveedor" onclick="modalDeleteProveedor('{{$proveedor->id}}', '{{$proveedor->is_active}}')"> Eliminar </button></td>
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
    