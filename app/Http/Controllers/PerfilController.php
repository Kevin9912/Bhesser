<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\catalog;
use App\Models\People;

class PerfilController extends Controller
{
    public function Perfil(Request $request)
    {
        if ($request->session()->has('key')) {
            $id_user = $request->session()->get('id_user');
            $perfiles = User::where("id",$id_user)->first();
            $subcatalogs = catalog::where('code','SYST_USER_ROLE')->first()->subcatalogs;
            return view("Perfil", compact("perfiles","subcatalogs"));
            } else{
                return view("login");
            }
    }

    public function Vista($id, Request $request)
    {
        if ($request->session()->has('key')) {
        $perfil = User::where("id",$id)->first();
        $subcatalogs = catalog::where('code','SYST_USER_ROLE')->first()->subcatalogs;
        return view("edit_perfil", compact("perfil", "subcatalogs"));
        } else{
            return view("login");
        }
    }

    public function guardar(Request $request)
    {
        $perfil = User::find($request->id);
        $people = People::find($request->id_person);
        $password = $request->password;
        $confirm = $request->confirmar;
        
        if(is_null($perfil)){
            return response()->json(["status" => "error", "message"=>"Perfil no Actualizado"]);

        }
        else if ($password == $confirm) {
            $perfil->user_name = $request->user_name;
            $perfil->password = $request->password;
            $perfil->save();
            $people->name = $request->name;
            $people->lastname_p = $request->lastname_p;
            $people->lastname_m = $request->lastname_m;
            $people->birthdate = $request->birthdate;
            $people->address = $request->address;
            $people->phone = $request->phone;
            $people->email = $request->email;
            $people->save();
            return response()->json(["status" => "success",  "message"=>"Perfil Actualizado Con Éxito"]);
        }else{
            return response()->json(["status" => "error", "message"=>"Las contraseñas no coinciden"]);
        }
    }
}
