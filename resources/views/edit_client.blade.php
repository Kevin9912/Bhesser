        @extends('master')
        @section('content')
            <h1 class="text-center text-white bg-primary"> Editar Cliente </h1>
            <div class="col-12">
                <div class="modal-body">
                    <form method="post" id="FrmEditClient" action="{{route('saveClient')}}">
                        <input type="hidden" name="id" value="{{$client->id}}">

                        @if($id_client == "")
                        <div class="form-group">
                            <label for="person">Persona</label>
                            <select id="person" class="form-control" name="id_person">
                                <option disabled selected value=""> Seleccione Una Persona </option>
                                @foreach($persons as $person)
                                <option value="{{$person->id}}"> {{$person->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <input type="hidden" name="id_person" value="{{$client->id_person}}">
                        @endif
                        
                        
                        @if($id_office=="")
                        <div class="form-group">
                            <label for="office">Oficina</label>
                            <select id="office" class="form-control" name="id_office">
                                <option disabled selected value="">Seleccione Oficina</option>
                                @foreach($offices as $office)
                                <option value="{{$office->id}}"> {{$office->business_name}} </option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="office">Oficina</label>
                            <select id="office" class="form-control" name="id_office">
                                <option disabled selected value="">Seleccione Una Persona</option>
                                @foreach($Oficinas as $Oficina)
                                <option @if($Oficina->id === $client->id_office) selected @endif
                                    value="{{$Oficina->id}}">{{$Oficina->business_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        
                        <button class="btn btn-primary" type="button" onclick="saveClient(this);"> Guardar </button>
                        <button class="btn btn-danger" type="button" onclick="location.href='{{ url()->previous() }}'"> Cancelar </button>
                    </form>
                </div>
            </div>  
            @endsection('content')
       