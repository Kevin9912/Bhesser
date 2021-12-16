<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\People;

class peopleController extends Controller
{
    public function home_people(Request $request)
    {
        if ($request->session()->has('key')) {
            $Peoples = People::get();
            return view("home_people", compact(["Peoples"]));
        } else{
            return view("login");
        }
        
    }

    public function frmPeople()
    {
        return view("home_people");
    }

    public function newpeople()
    {
        $people = new People();
        $view = View::make('edit_people', compact('people'))->render();
        return response()->json(["status" => "SUCCESS", "html" => $view]);
    }

    public function guardar(Request $request)
    {
        $people = People::find($request->id);
        $Error = $request->name; 
        $Error1 = $request->lastname_p;
        $Error2 = $request->lastname_m;
        $Error3 = $request->birthdate;
        $Error4 = $request->address;
        $Error5 = $request->phone;
        $Error6 = $request->email;
        $Punto = 0;
        if ($Error == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error1 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error2 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error3 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error4 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error5 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error6 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } else {
        if (is_null($people)) {
            $new_People = new People();
            $new_People->name = $request->name;
            $new_People->lastname_p = $request->lastname_p;
            $new_People->lastname_m = $request->lastname_m;
            $new_People->birthdate = $request->birthdate;
            $new_People->address = $request->address;
            $new_People->phone = $request->phone;
            $new_People->email = $request->email;
            $new_People->save();
            return response()->json(["status" => "success",  "message"=>"Persona Registrado Con Éxito"]);
        } else {
            $people->name = $request->name;
            $people->lastname_p = $request->lastname_p;
            $people->lastname_m = $request->lastname_m;
            $people->birthdate = $request->birthdate;
            $people->address = $request->address;
            $people->phone = $request->phone;
            $people->email = $request->email;
            $people->save();
            return response()->json(["status" => "success",  "message"=>"Persona Actualizado Con Éxito"]);
            }

        }
    }

    public function Vista($id, Request $request)
    {
        if ($request->session()->has('key')) {
        $people = People::where("id",$id)->first();
        return view("edit_people", compact("people"));
        } else{
            return view("login");
        }
    }
    
    public function delete(Request $request)
    {
        $people = People::find($request->id_people);
        if(is_null($people)){
            return response()->json(["status" => "ERROR"]);

        }
        else{
            $people->delete();
            return response()->json(["status" => "SUCCESS"]);

        }
    }

}
