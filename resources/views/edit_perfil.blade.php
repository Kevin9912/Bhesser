        @extends('master')
        @section('content')
            <h1 class="text-center text-white bg-primary"> Editar Perfil </h1>
            <div class="col-12">
            <div class="modal-body">
                <form method="post" id="frmEditPerfil" action="{{route('savePerfil')}}">
                    <div class="form-group">
                        <label for="user_name">Nombre de Usuario</label>
                        <input type="hidden" id="id" name="id" value="{{$perfil->id}}">
                        <input type="hidden" id="id_person" name="id_person" value="{{$perfil->id_person}}">
                        <input id="user_name" class="form-control" type="text" name="user_name" value="{{$perfil->user_name}}">
                    </div>
                    <div class="row" id="claves">
                        <div class="col md6">
                            <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="password" class="form-control" type="password" name="password" value="{{$perfil->password}}">
                            </div>
                        </div>
                        <div class="col md6">
                            <div class="form-group">
                            <label for="confirmar">Confirmar Contraseña</label>
                            <input id="confirmar" class="form-control" type="password" name="confirmar" value="{{$perfil->password}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new_role">Rol</label>
                         @foreach($subcatalogs as $subcatalog)
                         @if($subcatalog->id === $perfil->id_cat_role)
                        <input id="new_role" class="form-control" type="text" name="new_role" value="{{$subcatalog->name}}">
                        @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{$perfil->people->name}}">
                    </div>
                    <div class="form-group">
                        <label for="lastname_p">Apellido Paterno</label>
                        <input id="lastname_p" class="form-control" type="text" name="lastname_p" value="{{$perfil->people->lastname_p}}">
                    </div>
                    <div class="form-group">
                        <label for="lastname_m">Apellido Materno</label>
                        <input id="lastname_m" class="form-control" type="text" name="lastname_m" value="{{$perfil->people->lastname_m}}">
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Fecha de Cumpleaños</label>
                        <input id="birthdate" class="form-control" type="date" name="birthdate" value="{{$perfil->people->birthdate}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input id="address" class="form-control" type="text" name="address" value="{{$perfil->people->address}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input id="phone" class="form-control" type="number" name="phone" value="{{$perfil->people->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input id="email" class="form-control" type="text" name="email" value="{{$perfil->people->email}}">
                    </div>
                    
                    <button class="btn btn-primary" type="button" onclick="savePerfil(this);"> Registrar </button>
                    <button class="btn btn-danger" type="button" onclick="location.href='{{ url()->previous() }}'"> Cancelar </button>
                </form>
            </div>
            </div>
            @endsection('content')
        