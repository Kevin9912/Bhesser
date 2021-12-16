                @extends('master')
                @section('content')
                @include("regist_client")
                @include("delete_Client")
                <h1 class="text-center text-white bg-primary"> Clientes </h1>
                <div class="col-12">
                <button class="btn btn-secondary mb-3" type="button" data-toggle="modal" data-target="#nuevo_cliente"  onclick="regClient()"><i class="fas fa-user-plus"></i></button>
                <table class="table table-light" id="tblUsuarios">
                <thead class="thead-dark">
                <tr>
                    <th>Nombre de Persona</th>
                    <th>Oficina</th>
                    <th>Creación</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach($clients as $client)
                    <td>{{$client->people->name}}</td>
                    <td>{{$client->office->business_name}}</td>
                    <td>{{$client->created}}</td>
                    <td><a class="btn btn-primary" type="button" href="client/edit/{{$client->id}}"><i class="fas fa-user-edit"></i></a></td>
                    <td><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#eliminar_cliente" onclick="modalDeleteClient('{{$client->id}}')"><i class="fas fa-user-times"></i></button></td>
                    </tr>
                @endforeach
                </tbody>
                </table>
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
