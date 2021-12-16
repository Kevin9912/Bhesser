        @extends('master')
        @section('content')
                <h1 class="text-center text-white bg-primary"> Editar Proveedores </h1>
                <div class="col-12">
            <div class="modal-body">
                <form method="post" id="frmEditProveedor" action="{{route('saveProveedor')}}">
                <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="id" name="id" value="{{$proveedores->id}}">
                        <input id="name" class="form-control" type="text" name="name" value="{{$proveedores->name}}">
                    </div>
                    <div class="form-group">
                        <label for="date_relation">Fecha de Asociación</label>
                        <input id="date_relation" class="form-control" type="date" name="date_relation" value="{{$proveedores->date_relation}}">
                    </div>
                    
                    <button class="btn btn-primary" type="button" onclick="saveProveedor(this);"> Guardar </button>
                    <button class="btn btn-danger" type="button" onclick="location.href='{{ url()->previous() }}'"> Cancelar </button>
                </form>
            </div>
        </div>
        @endsection('content')
   