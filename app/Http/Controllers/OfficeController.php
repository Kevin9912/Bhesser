<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\office;
class OfficeController extends Controller
{
    public function Vista()
    {
        return view("home_office");
    }

    public function home_Office(Request $request)
    {
        if ($request->session()->has('key')) {
            $offices = office::select("*", "office.id")->join('company', 'office.id_company', '=', 'company.id')->get();
            return view("home_office", compact(["offices"]));
        } else{
            return view("login");
        }
        
    }

    public function newOffice(){

        $offices = new office();
        $id_company="";
        $companys = company::get();
        $view = View::make('edit_office', compact('offices', 'companys', 'id_company'))->render();

        return response()->json(["status" => "SUCCESS", "html" => $view]);

    }

    public function guardar(Request $request)
    {
        $office = office::find($request->id);
        $Error1 = $request->business_name;
        $Error2 = $request->id_company;
        $Error3 = $request->address_office;
        $Punto = 0;
        if ($Error1 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error2 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error3 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } else {
            if (is_null($office)) {
                $new_office = new office();
                $new_office->business_name = $request->business_name;
                $new_office->id_company = $request->id_company;
                $new_office->address_office = $request->address_office;
                $new_office->save();
                return response()->json(["status" => "success",  "message"=>"Oficina Registrada Con Éxito"]);
            } else {
                $office->business_name = $request->business_name;
                $office->id_company = $request->id_company;
                $office->address_office = $request->address_office;
                $office->save();
                return response()->json(["status" => "success",  "message"=>"Oficina Actualizada Con Éxito"]);
                }
        }
    }

    public function Vista1($id, Request $request)
    {
        if ($request->session()->has('key')) {
        $offices = office::where("id",$id)->first();
        $id_company = $offices->company->id;
        $companys = collect([]);
        $comps = company::get();
        return view("edit_office", compact("offices", "companys", "comps", "id_company"));
        } else{
            return view("login");
        }
    }

    public function delete(Request $request)
    {
        $office = office::find($request->id_company);
        if(is_null($office)){
            return response()->json(["status" => "ERROR"]);

        }
        else{
            $office->delete();
            return response()->json(["status" => "SUCCESS"]);

        }
    }
}
