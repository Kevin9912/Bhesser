        @extends('master')
        @section('content')
                <h1 class="text-center text-white bg-primary"> Editar Personas </h1>
                <div class="col-12">
            <div class="modal-body">
                <form method="post" id="frmEditPeople" action="{{route('savePeople')}}">
                <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="id" name="id" value="{{$people->id}}">
                        <input id="name" class="form-control" type="text" name="name" value="{{$people->name}}">
                    </div>
                    <div class="form-group">
                        <label for="lastname_p">Apellido Paterno</label>
                        <input id="lastname_p" class="form-control" type="text" name="lastname_p" value="{{$people->lastname_p}}">
                    </div>
                    <div class="form-group">
                        <label for="lastname_m">Apellido Materno</label>
                        <input id="lastname_m" class="form-control" type="text" name="lastname_m" value="{{$people->lastname_m}}">
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Fecha de Cumpleños</label>
                        <input id="birthdate" class="form-control" type="date" name="birthdate" value="{{$people->birthdate}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input id="address" class="form-control" type="text" name="address" value="{{$people->address}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input id="phone" class="form-control" type="text" name="phone" value="{{$people->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input id="email" class="form-control" type="text" name="email" value="{{$people->email}}">
                    </div>
                    <button class="btn btn-primary" type="button" onclick="savePeople(this);"> Guardar </button>
                    <button class="btn btn-danger" type="button" onclick="location.href='{{ url()->previous() }}'"> Cancelar </button>
                </form>
            </div>
        </div>
        @endsection('content')
   