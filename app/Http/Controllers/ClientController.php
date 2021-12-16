<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Client;
use App\Models\People;
use App\Models\office;

class ClientController extends Controller
{
    public function home_client(Request $request)
    {
        if ($request->session()->has('key')) {
            $clients = Client::select("*", "clientes.id")->get();
            $clients = $clients->reject(function($client){
                return $client->people === null;
            })->map(function($client){
                $client->people = $client->people;
                return $client;
            });
            $clients = $clients->reject(function($client){
                return $client->office === null;
            })->map(function($client){
                $client->office = $client->office;
                return $client;
            });
            return view("home_client", compact(["clients"]));
        } else{
            return view("login");
        }
        
    }

    public function frmclient()
    {
        return view("home_client");
    }

    public function newclient()
    {
        $client = new Client();
        $id_client="";
        $id_office="";
        $persons = People::get();
        $offices = office::get();
        $Personas = collect([]);
        $Oficinas = collect([]);
        $view = View::make('edit_client', compact('client','id_client','id_office','persons','offices', 'Personas', 'Oficinas'))->render();
        return response()->json(["status" => "SUCCESS", "html" => $view]);
    }

    public function guardar(Request $request)
    {
        $client = Client::find($request->id);
        $Error1 = $request->id_person;
        $Error2 = $request->id_office;
        $Punto = 0;
        if ($Error1 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error2 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } else {
            if (is_null($client)) {
                $new_client = new Client();
                $new_client->id_person = $request->id_person;
                $new_client->id_office = $request->id_office;
                $new_client->save();
                return response()->json(["status" => "success",  "message"=>"Cliente Registrado Con Éxito"]);
            } else{
                $client->id_person = $request->id_person;
                $client->id_office = $request->id_office;
                $client->save();
                return response()->json(["status" => "success",  "message"=>"Cliente Actualizado Con Éxito"]);
            } 
        }
    }

    public function Vista($id, Request $request)
    {
        if ($request->session()->has('key')) {
        $client = Client::where("id",$id)->first();
        $id_client = $client->id;
        $id_office = $client->office->id;
        $persons = collect([]);
        $offices = collect([]);
        $Personas = People::get();
        $Oficinas = office::get();
        return view("edit_client", compact("client", "id_client", "id_office", "persons", "offices", "Personas", "Oficinas"));
        } else{
            return view("login");
        }
    }

    public function delete(Request $request)
    {
        $client = Client::find($request->id_client);
        if(is_null($client)){
            return response()->json(["status" => "ERROR"]);

        }
        else{
            $client->delete();
            return response()->json(["status" => "SUCCESS"]);

        }
    }
}
