        @extends('master')
        @section('content')
        @include("regist_office")
        @include("delete_office")
            <h1 class="text-center text-white bg-primary"> Oficinas </h1>
            <div class="col-12">
            <button class="btn btn-secondary mb-3" type="button" data-toggle="modal" data-target="#nuevo_office"  onclick="regOffice()"> Registrar </button>
                <table class="table table-light" id="tblUsuarios">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre de la Oficina</th>
                            <th>Empresa</th>
                            <th>Dirección de la Oficina</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offices as $office)
                        <tr>
                            <td>{{$office->business_name}}</td>
                            <td>{{$office->name}}</td>
                            <td>{{$office->address_office}}</td>
                            <td><a class="btn btn-primary" type="button" href="office/edit/{{$office->id}}"> Editar </a></td>
                            <td><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#eliminar_oficina" onclick="modalDeleteOffice('{{$office->id}}')"> Eliminar </button></td>
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
    