        @extends('master')
        @section('content')
            <h1 class="text-center text-white bg-primary"> Editar Oficina </h1>
            <div class="col-12">
                <div class="modal-body">
                    <form method="post" id="FrmEditoffice" action="{{route('saveOffice')}}">

                    <div class="form-group">
                            <label for="business_name">Nombre de la Oficina</label>
                            <input type="hidden" id="id" name="id" value="{{$offices->id}}">
                            <input id="business_name" class="form-control" type="text" name="business_name" value="{{$offices->business_name}}">
                        </div>
                       
                        @if($id_company == "")
                        <div class="form-group">
                            <label for="id_company">Empresa</label>
                            <select id="id_company" class="form-control" name="id_company">
                                <option disabled selected value="">Seleccione una Empresa</option>
                                @foreach($companys as $company)
                                <option @if($company->id === $offices->id_company) selected @endif
                                    value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="id_company">Empresa</label>
                            <select id="id_company" class="form-control" name="id_company">
                                <option disabled selected value="">Seleccione Una Persona</option>
                                @foreach($comps as $company)
                                <option @if($company->id === $offices->id_company) selected @endif
                                    value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        
                        <div class="form-group">
                            <label for="address_office">Dirección de la Oficina</label>
                            <input type="hidden" id="id" name="id" value="{{$offices->id}}">
                            <input id="address_office" class="form-control" type="text" name="address_office" value="{{$offices->address_office}}">
                        </div>

                        <button class="btn btn-primary" type="button" onclick="saveOffice(this);"> Guardar </button>
                        <button class="btn btn-danger" type="button" onclick="location.href='{{ url()->previous() }}'"> Cancelar </button>
                    </form>
                </div>
            </div>
            @endsection('content')
        