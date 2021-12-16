<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\proveedores;

class ProveedoresController extends Controller
{
    public function Vista()
    {
        return view("home_proveedores");
    }

    public function home_Proveedores(Request $request)
    {
        if ($request->session()->has('key')) {
            $proveedores = proveedores::get();
            return view("home_proveedores", compact(["proveedores"]));
        } else{
            return view("login");
        }
        
    }

    public function newproveedor()
    {
        $proveedores = new proveedores();
        $view = View::make('edit_proveedor', compact('proveedores'))->render();
        return response()->json(["status" => "SUCCESS", "html" => $view]);
    }

    public function Vista1($id, Request $request)
    {
        if ($request->session()->has('key')) {
        $proveedores = proveedores::where("id",$id)->first();
        return view("edit_proveedor", compact("proveedores"));
        } else{
            return view("login");
        }
    }

    public function guardar(Request $request)
    {
        $proveedores = proveedores::find($request->id);
        $Error1 = $request->name;
        $Error2 = $request->date_relation;
        $Punto = 0;
        if ($Error1 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error2 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } else {
            if (is_null($proveedores)) {
                $new_proveedores = new proveedores();
                $new_proveedores->name = $request->name;
                $new_proveedores->date_relation = $request->date_relation;
                $new_proveedores->save();
                return response()->json(["status" => "success",  "message"=>"Proveedor Registrado Con Éxito"]);
            } else {
                $proveedores->name = $request->name;
                $proveedores->date_relation = $request->date_relation;
                $proveedores->save();
                return response()->json(["status" => "success",  "message"=>"Proveedor Actualizado Con Éxito"]);
                }
        }
        
    }

    public function delete(Request $request)
    {
        $type = $request->type;
        $proveedor = proveedores::find($request->id_proveedor);
        if (is_null($proveedor)) {
            return response()->json(["status" => "error", "message"=>"Proveedor no Eliminado"]);
        } else {
            switch ($type) {
                case "ELIMINAR":
                    $proveedor->delete();
                    break;
                case "INHABILITAR":
                    $proveedor->is_active = $proveedor->is_active==0 ? 1 : 0;
                    $proveedor->save();
                    break;
            }
            return response()->json(["status" => "success", "message"=>"Proveedor Eliminado Con Éxito o Estatus Cambiado Con Éxito"]);
        }
    }
}
