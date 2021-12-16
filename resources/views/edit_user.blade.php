            @extends('master')
            @section('content')
            <h1 class="text-center text-white bg-primary"> Editar Usuario </h1>
            <div class="col-12">
                <div class="modal-body">
                    <form method="post" id="FrmEditUser" action="{{route('saveUser')}}">

                        @if($id_person=="")
                        <div class="form-group">
                            <label for="person">Persona</label>
                            <select id="person" class="form-control" name="id_person">
                                <option disabled selected value="">Seleccione una Persona</option>
                                @foreach($persons as $person)
                                <option value="{{$person->id}}">{{$person->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <input type="hidden" id="id_person" name="id_person" value="{{$id_person}}">
                        @endif
                        <div class="form-group">
                            <label for="new_user">Usuario</label>
                            <input type="hidden" id="id" name="id" value="{{$user->id}}">
                            <input id="new_user" class="form-control" type="text" name="user_name" value="{{$user->user_name}}">
                        </div>

                        <div class="row" id="claves">
                            <div class="col md6">
                                <div class="form-group">
                                    <label for="new_password">Contraseña</label>
                                    <input id="new_password" class="form-control" type="password" name="password" value="{{$user->password}}">
                                </div>
                            </div>
                            <div class="col md6">
                                <div class="form-group">
                                    <label for="confirm_password">Confirmar Contraseña</label>
                                    <input id="confirm_password" class="form-control" type="password" name="confirm_password" value="{{$user->password}}">
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_role">Rol</label>
                            <select id="new_role" class="form-control" name="role">
                                <option disabled selected value="">Seleccione un Rol</option>
                                @foreach($subcatalogs as $subcatalog)
                                <option @if($subcatalog->id === $user->id_cat_role) selected @endif
                                    value="{{$subcatalog->id}}">{{$subcatalog->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" type="button" onclick="saveUser(this);"> Guardar </button>
                        <button class="btn btn-danger" type="button" onclick="location.href='{{ url()->previous() }}'"> Cancelar </button>
                    </form>
                </div>
            </div>
        @endsection('content')