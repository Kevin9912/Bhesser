        @extends('master')
        @section('content')
            <h1 class="text-center text-white bg-primary"> Editar Producto </h1>
            <div class="col-12">
                <div class="modal-body">
                    <form method="post" id="FrmEditInventario" action="{{route('saveInventario')}}">

                        <div class="form-group">
                            <label for="Article">Articulo</label>
                            <input type="hidden" id="id" name="id" value="{{$inventario->id}}">
                            <input id="Article" class="form-control" type="text" name="Article" value="{{$inventario->Article}}">
                        </div>

                        @if($id_office=="")
                        <div class="form-group">
                            <label for="Sucursal">Sucursal</label>
                            <select id="Sucursal" class="form-control" name="Sucursal">
                                <option disabled selected value="">Seleccione la Sucursal</option>
                                @foreach($offices as $office)
                                <option value="{{$office->id}}">{{$office->business_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="Sucursal">Sucursal</label>
                            <select id="Sucursal" class="form-control" name="Sucursal">
                                <option disabled selected value="">Seleccione rol</option>
                                @foreach($oficinas as $oficina)
                                <option @if($oficina->id === $inventario->Sucursal) selected @endif
                                <option value="{{$oficina->id}}">{{$oficina->business_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="hidden" id="id" name="id" value="{{$inventario->id}}">
                            <input id="cantidad" class="form-control" type="text" name="cantidad" value="{{$inventario->cantidad}}">
                        </div>

                        <div class="form-group">
                            <label for="estado_fisico">Estado Fisico</label>
                            <select id="estado_fisico" class="form-control" name="estado_fisico">
                                <option disabled selected value="">Seleccione el Estado Fisico</option>
                                @foreach($substatus as $subcatalog)
                                <option @if($subcatalog->id === $inventario->estado_fisico) selected @endif
                                    value="{{$subcatalog->id}}">{{$subcatalog->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="precio_unitario">Precio Unitario</label>
                            <input type="hidden" id="id" name="id" value="{{$inventario->id}}">
                            <input id="precio_unitario" class="form-control" type="text" name="precio_unitario" value="{{$inventario->precio_unitario}}">
                        </div>

                        <div class="form-group">
                            <label for="precio_venta">Precio Venta</label>
                            <input type="hidden" id="id" name="id" value="{{$inventario->id}}">
                            <input id="precio_venta" class="form-control" type="text" name="precio_venta" value="{{$inventario->precio_venta}}">
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio Adquisición</label>
                            <input type="hidden" id="id" name="id" value="{{$inventario->id}}">
                            <input id="precio" class="form-control" type="text" name="precio" value="{{$inventario->precio}}">
                        </div>

                    @if($id_proveedor=="")
                        <div class="form-group">
                            <label for="id_proveedor">Proveedor</label>
                            <select id="id_proveedor" class="form-control" name="id_proveedor">
                                <option disabled selected value="">Seleccione el Proveedor</option>
                                @foreach($provedors as $proveedor)
                                <option value="{{$proveedor->id}}">{{$proveedor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="id_proveedor">Proveedor</label>
                            <select id="id_proveedor" class="form-control" name="id_proveedor">
                                <option disabled selected value="">Seleccione rol</option>
                                @foreach($proveedores as $proveedor)
                                <option @if($proveedor->id === $inventario->id_proveedor) selected @endif
                                <option value="{{$proveedor->id}}">{{$proveedor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        
                        <button class="btn btn-primary" type="button" onclick="saveInventario(this);"> Guardar </button>
                        <button class="btn btn-danger" type="button" onclick="location.href='{{ url()->previous() }}'"> Cancelar </button>
                    </form>
                </div>
            </div>
            @endsection('content')
       