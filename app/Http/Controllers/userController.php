<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\catalog;
use App\Models\People;

class userController extends Controller
{
    //
    public function obtener($id, $name){
        echo($id . " " .$name);
    }

    public function bienvenido(Request $request)
    {
        if ($request->session()->has('key')) {
            return view("welcome");
        } else{
            return view("login");
        }
        
    }

    public function home(Request $request)
    {
        if ($request->session()->has('key')) {
            $users = User::select("*", "usuario.is_active", "usuario.id")->join('subcatalogos', 'usuario.id_cat_role', '=', 'subcatalogos.id')->get();
            $id_user = $request->session()->get('id_user');
            $users = $users->reject(function($user){
                return $user->people === null;
            })->map(function($user){
                $user->people = $user->people;
                return $user;
                #dd($user->people);
            });

            $subcatalogs = catalog::where('code','SYST_USER_ROLE')->first()->subcatalogs;
            return view("home", compact(["users","subcatalogs"]));
        } else{
            return view("login");
        }
        
    }

    public function Vista($id, Request $request)
    {
        if ($request->session()->has('key')) {
        $user = User::where("id",$id)->first();
        $id_person = $user->people->id;
        $subcatalogs = catalog::where('code','SYST_USER_ROLE')->first()->subcatalogs;
        $persons = collect([]);
        return view("edit_user", compact("user", "subcatalogs", "id_person", "persons"));
        } else{
            return view("login");
        }
    }
    
    public function new(){

        $user = new User();
        $id_person="";
        $persons = People::get();
        $subcatalogs = catalog::where('code','SYST_USER_ROLE')->first()->subcatalogs;
        $view = View::make('edit_user', compact('user', 'subcatalogs', "id_person", "persons"))->render();

        return response()->json(["status" => "SUCCESS", "html" => $view]);

    }

    public function guardar(Request $request)
    {
        $user = User::find($request->id);
        
        $Password = $request->password;
        $Confirm_Password = $request->confirm_password;

        if ($Password == $Confirm_Password) {
            if (is_null($user)) {
                $new_user = new User();
                $new_user->user_name = $request->user_name;
                $new_user->id_person = $request->id_person;
                $new_user->password = $request->password;
                $new_user->id_cat_role = $request->role;
                $new_user->save();
                return response()->json(["status" => "success",  "message"=>"Usuario Registrado Con Éxito"]);
            } else {
                $user->user_name = $request->user_name;
                $user->id_person = $request->id_person;
                $user->password = $request->password;
                $user->id_cat_role = $request->role;
                $user->save();
                return response()->json(["status" => "success",  "message"=>"Usuario Actualizado Con Éxito"]);
            }
        } else {
            return response()->json(["status" => "error", "message"=>"Las contraseñas no coinciden"]);
        }
    }

    public function delete(Request $request)
    {
        $type = $request->type;
        $user = User::find($request->id_user);
        if (is_null($user)) {
            return response()->json(["status" => "error", "message"=>"Usuario no Eliminado"]);
        } else {
            switch ($type) {
                case "ELIMINAR":
                    $user->delete();
                    break;
                    
                case "INHABILITAR":
                    $user->is_active = $user->is_active==0 ? 1 : 0;
                    $user->save();
                    break;
                   
            }
            return response()->json(["status" => "success", "message"=>"Usuario Eliminado Con Exito o Estatus Cambiado Con Éxito"]);
        }
    }
}
