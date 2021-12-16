@extends('master')
@section('content')
@include("regist_User")
@include("delete_user")
<h1 class="text-center text-white bg-primary"> Usuarios </h1>
<div class="col-12">
    <button class="btn btn-secondary mb-3" type="button" data-toggle="modal" data-target="#nuevo_usuario" onclick="regUser()"><i class="fas fa-user-plus"></i></button>
    <table class="table table-light" id="tblUsuarios">
        <thead class="thead-dark">
            <tr>
                <th>Nombre de Usuario</th>
                <th>Persona</th>
                <th>Rol</th>
                <th>Estatus</th>
                <th>Creado</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->user_name}}</td>
                <td>{{$user->people->name}}</td>
                <td>{{$user->name}}</td>
                @if ($user->is_active == 1)
                <td><span class="badge badge-success"> Activo </span></td>
                @else
                <td><span class="badge badge-danger"> Inactivo </span></td>
                @endif
                <td>{{$user->created}}</td>
                <td><a class="btn btn-primary" type="button" href="user/edit/{{$user->id}}"><i class="fas fa-user-edit"></i></a></td>
                <td><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#eliminar_usuario" onclick="modalDelete('{{$user->id}}', '{{$user->is_active}}')"><i class="fas fa-user-times"></i></button></td>
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