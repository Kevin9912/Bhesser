        @extends('master')
        @section('content')
                <h1 class="text-center text-white bg-primary"> Editar Empresa </h1>
                <div class="col-12">
            <div class="modal-body">
                <form method="post" id="frmEditEmpresa" action="{{route('saveCompany')}}">
                <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="id" name="id" value="{{$company->id}}">
                        <input id="name" class="form-control" type="text" name="name" value="{{$company->name}}">
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input id="rfc" class="form-control" type="text" name="rfc" value="{{$company->rfc}}">
                    </div>
                    <div class="form-group">
                        <label for="town">Ciudad</label>
                        <input id="town" class="form-control" type="text" name="town" value="{{$company->town}}">
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Codigo Postal</label>
                        <input id="postal_code" class="form-control" type="text" name="postal_code" value="{{$company->postal_code}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input id="phone" class="form-control" type="text" name="phone" value="{{$company->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input id="address" class="form-control" type="text" name="address" value="{{$company->address}}">
                    </div>
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <input id="state" class="form-control" type="text" name="state" value="{{$company->state}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input id="email" class="form-control" type="text" name="email" value="{{$company->email}}">
                    </div>
                    <div class="form-group">
                        <label for="website">Pagina Web</label>
                        <input id="website" class="form-control" type="text" name="website" value="{{$company->website}}">
                    </div>
                    <button class="btn btn-primary" type="button" onclick="saveCompany(this);"> Guardar </button>
                    <button class="btn btn-danger" type="button" onclick="location.href='{{ url()->previous() }}'"> Cancelar </button>
                </form>
            </div>
        </div>
        @endsection('content')
    