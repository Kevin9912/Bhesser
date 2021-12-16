<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\inventario;
use App\Models\catalog;
use App\Models\office;
use App\Models\proveedores;

class inventarioController extends Controller
{
    public function homeAlmacen(Request $request)
    {
        if ($request->session()->has('key')) {
            $inventarios = inventario::select("*", "inventario.id")->join('subcatalogos', 'inventario.estado_fisico', '=', 'subcatalogos.id')->get();

            $inventarios = $inventarios->reject(function($inventario){
                return $inventario->proveedor === null;
            })->map(function($inventario){
                $inventario->proveedor = $inventario->proveedor;
                return $inventario;
            });

            $inventarios = $inventarios->reject(function($inventario){
                return $inventario->office === null;
            })->map(function($inventario){
                $inventario->office = $inventario->office;
                return $inventario;
            });

            $substatus = catalog::where('code','SYST_PRODUCT_STATUS')->first()->substatus;
            return view("home_almacen", compact(["inventarios","substatus"]));
        } else{
            return view("login");
        }
    }
    
    public function search(Request $request){
        $name_product = $request->name_product;
        if(!is_null($name_product)){
            $productos = inventario::where('Article', 'like', '%' . $name_product . '%')->get();
            if(!is_null($productos)){
                return response()->json(["status" => "SUCCESS", "productos" => $productos]);

            }
            else{
                return response()->json(["status" => "ERROR", "productos" => $productos]);

            }

        }
        else{
            return response()->json(["status" => "ERROR", "productos" => $name_product]);

        }



    }

    public function Vista($id, Request $request)
    {
        if ($request->session()->has('key')) {
        $inventario = inventario::where("id",$id)->first();
        $id_proveedor = $inventario->proveedor->id;
        $id_office = $inventario->office->id;
        $substatus = catalog::where('code','SYST_PRODUCT_STATUS')->first()->substatus;
        $provedors = collect([]);
        $offices = collect([]);
        $proveedores = proveedores::get();
        $oficinas = office::get();
        return view("edit_inventario", compact("inventario", "substatus", "id_proveedor", "id_office",  "provedors", "offices", "proveedores", "oficinas"));
        } else{
            return view("login");
        }
    }
    
    public function newInventario(){

        $inventario = new inventario();
        $id_proveedor="";
        $id_office = "";
        $provedors = proveedores::get();
        $offices = office::get();
        $substatus = catalog::where('code','SYST_PRODUCT_STATUS')->first()->substatus;
        $view = View::make('edit_inventario', compact('inventario', 'substatus', "id_proveedor", "id_office", "offices", "provedors"))->render();

        return response()->json(["status" => "SUCCESS", "html" => $view]);

    }

    public function guardar(Request $request)
    {
        $inventario = inventario::find($request->id);
        $Error = $request->Article; 
        $Error1 = $request->Sucursal;
        $Error2 = $request->cantidad;
        $Error3 = $request->estado_fisico;
        $Error5 = $request->precio_unitario;
        $Error6 = $request->precio_venta;
        $Error7 = $request->precio;
        $Error8 = $request->id_proveedor;
        $Punto = 0;
        if ($Error == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error1 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error2 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error3 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        }  elseif ($Error5 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error6 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error7 == $Punto){
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error8 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        }
        else {
        if (is_null($inventario)) {
            $dt = new \DateTime();
            $new_inventario = new inventario();
            $new_inventario->Article = $request->Article;
            $new_inventario->date_in = $dt->format('Y-m-d');
            $new_inventario->Sucursal = $request->Sucursal;
            $new_inventario->cantidad = $request->cantidad;
            $new_inventario->estado_fisico = $request->estado_fisico;
            $new_inventario->precio_unitario = $request->precio_unitario;
            $new_inventario->precio_venta = $request->precio_venta;
            $new_inventario->precio = $request->precio;
            $new_inventario->id_proveedor = $request->id_proveedor;
            $new_inventario->save();
            return response()->json(["status" => "success",  "message"=>"Producto Registrado Con Éxito"]);
        } else {
            $inventario->Article = $request->Article;
            $inventario->Sucursal = $request->Sucursal;
            $inventario->cantidad = $request->cantidad;
            $inventario->estado_fisico = $request->estado_fisico;
            $inventario->precio_unitario = $request->precio_unitario;
            $inventario->precio_venta = $request->precio_venta;
            $inventario->precio = $request->precio;
            $inventario->id_proveedor = $request->id_proveedor;
            $inventario->save();
            return response()->json(["status" => "success",  "message"=>"Producto Actualizado Con Éxito"]);
            }

        }
    }

    public function delete(Request $request)
    {
        $inventario = inventario::find($request->id_inventario);
        if(is_null($inventario)){
            return response()->json(["status" => "error", "message"=>"Producto no Eliminado"]);

        }
        else{
            $inventario->delete();
            return response()->json(["status" => "success", "message"=>"Producto Eliminado Con Éxito"]);

        }
    }

    public function Salida(Request $request)
    {
        $inventario = inventario::find($request->id_inventario);
        $dato = $inventario->date_out;
        if(is_null($dato)){
            $dt = new \DateTime();
            $inventario->status = 0;
            $inventario->date_out = $dt->format('Y-m-d');
            $inventario->save();
            return response()->json(["status" => "success", "message"=>"Dato de Salida Con Éxito"]);
            

        }
        else{
            return response()->json(["status" => "error", "message"=>"Dato de Salida sin Éxito"]);

        }
    }
}
