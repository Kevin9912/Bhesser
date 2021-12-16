        @extends('master')
        @section('content')
        @include("regist_company")
        @include("delete_company")
            <h1 class="text-center text-white bg-primary"> Empresas </h1>
            <div class="col-12">
            <button class="btn btn-secondary mb-3" type="button" data-toggle="modal" data-target="#nuevo_company"  onclick="regCompany()"> Registrar </button>
                <table class="table table-light" id="tblUsuarios">
                    <thead class="thead-dark">   
                    <tr>
                            <th>Nombre</th>
                            <th>Rfc</th>
                            <th>Ciudad</th>
                            <th>Código Postal</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th>Correo Electronico</th>
                            <th>Sitio Web</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($companys as $company) 
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->rfc}}</td>
                            <td>{{$company->town}}</td>
                            <td>{{$company->postal_code}}</td>
                            <td>{{$company->phone}}</td>
                            <td>{{$company->address}}</td>
                            <td>{{$company->state}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->website}}</td>
                            <td><a class="btn btn-primary" type="button" href="company/edit/{{$company->id}}"> Editar </a></td>
                            <td><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#eliminar_empresa" onclick="modalDeleteCompany('{{$company->id}}')"> Eliminar </button></td>
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
    