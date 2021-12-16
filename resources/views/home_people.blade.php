
                @extends('master')
                @section('content')
                @include("regist_people")
                @include("delete_people")
                <h1 class="text-center text-white bg-primary"> Personas </h1>
                <div class="col-12">
                <button class="btn btn-secondary mb-3" type="button" data-toggle="modal" data-target="#nuevo_persona" onclick="regPeople()"><i class="fas fa-user-plus"></i></button>
                <table class="table table-light" id="tblUsuarios">
                <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha de Cumpleños</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Correo Electronico</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($Peoples as $people)
                    <tr>
                    <td>{{$people->name}}</td>
                    <td>{{$people->lastname_p}}</td>
                    <td>{{$people->lastname_m}}</td>
                    <td>{{$people->birthdate}}</td>
                    <td>{{$people->address}}</td>
                    <td>{{$people->phone}}</td>
                    <td>{{$people->email}}</td>
                    <td><a class="btn btn-primary" type="button" href="people/edit/{{$people->id}}"><i class="fas fa-user-edit"></i></a></td>
                    <td><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#eliminar_persona" onclick="modalDeletePeople('{{$people->id}}')"><i class="fas fa-user-times"></i></button></td>
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