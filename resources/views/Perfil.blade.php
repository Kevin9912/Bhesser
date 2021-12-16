
            @extends('master')
            @section('content')
            <h1 class="text-center text-white bg-primary mb-3"> Perfil </h1>
                <div class="col-12">
                     <div class="row mb-2"> 
                        <div class="col-md-6 mb-3">
                        <h3> Nombre de Usuario: </h3>
                        <h4> {{$perfiles->user_name}} </h4>
                        </div>
                        <div class="col-md-6 mb-3">
                        <h3> Contraseña: </h3>
                        <h4> {{$perfiles->password}} </h4>
                        </div>
                        <div class="col-md-12 mb-3">
                        <h3> Cargo: </h3>
                        @foreach($subcatalogs as $subcatalog)
                        @if($subcatalog->id == $perfiles->id_cat_role)
                        <h4> {{$subcatalog->name}} </h4>
                        @else
                        @endif
                        @endforeach
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6 mb-3">
                        <h3> Nombre: </h3>
                        <h4> {{$perfiles->people->name}} </h4>
                        </div>
                        <div class="col-md-6 mb-3">
                        <h3> Apellido Paterno: </h3>
                        <h4> {{$perfiles->people->lastname_p}} </h4>
                        </div>
                        <div class="col-md-6 mb-3">
                        <h3> Apellido Materno: </h3>
                        <h4> {{$perfiles->people->lastname_m}} </h4>
                        </div>
                        <div class="col-md-6 mb-3">
                        <h3> Fecha de Cumpleaños: </h3>
                        <h4> {{$perfiles->people->birthdate}} </h4>
                        </div>
                        <div class="col-md-6 mb-3">
                        <h3> Dirección: </h3>
                        <h4> {{$perfiles->people->address}} </h4>
                        </div>
                        <div class="col-md-6 mb-3">
                        <h3> Número de Telefono: </h3>
                        <h4> {{$perfiles->people->phone}} </h4>
                        </div>
                        <div class="col-md-6 mb-3">
                        <h3> Correo Electronico: </h3>
                        <h4> {{$perfiles->people->email}} </h4>
                        </div>
                </div>
                <button class="btn btn-primary mb-3 float-right" type="button" onclick="location.href='/Bienvenido'"> Menu </button>
                <a class="btn btn-danger mb-3 float-right" type="button" href="/perfil/edit/{{$perfiles->id}}"> Editar </a>
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