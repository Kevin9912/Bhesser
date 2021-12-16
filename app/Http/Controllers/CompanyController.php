<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\company;
class CompanyController extends Controller
{
    public function Vista()
    {
        return view("home_company");
    }

    public function home_Company(Request $request)
    {
        if ($request->session()->has('key')) {
            $companys = company::get();
            return view("home_company", compact(["companys"]));
        } else{
            return view("login");
        }
        
    }

    public function newcompany()
    {
        $company = new company();
        $view = View::make('edit_company', compact('company'))->render();
        return response()->json(["status" => "SUCCESS", "html" => $view]);
    }

    public function guardar(Request $request)
    {
        $company = company::find($request->id);
        $Error = $request->name; 
        $Error1 = $request->rfc;
        $Error2 = $request->town;
        $Error3 = $request->postal_code;
        $Error4 = $request->phone;
        $Error5 = $request->address;
        $Error6 = $request->state;
        $Error7 = $request->email;
        $Error8 = $request->website;
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
        } elseif ($Error7 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        } elseif ($Error8 == $Punto) {
            return response()->json(["status" => "error", "message"=>"Campo Incompleto"]);
        }
        else {
        if (is_null($company)) {
            $new_company = new company();
            $new_company->name = $request->name;
            $new_company->rfc = $request->rfc;
            $new_company->town = $request->town;
            $new_company->postal_code = $request->postal_code;
            $new_company->phone = $request->phone;
            $new_company->address = $request->address;
            $new_company->state = $request->state;
            $new_company->email = $request->email;
            $new_company->website = $request->website;
            $new_company->save();
            return response()->json(["status" => "success",  "message"=>"Empresa Registrada Con Éxito"]);
        } else {
            $company->name = $request->name;
            $company->rfc = $request->rfc;
            $company->town = $request->town;
            $company->postal_code = $request->postal_code;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->state = $request->state;
            $company->email = $request->email;
            $company->website = $request->website;
            $company->save();
            return response()->json(["status" => "success",  "message"=>"Empresa Actualizada Con Éxito"]);
            }

        }
    }

    public function Vista1($id, Request $request)
    {
        if ($request->session()->has('key')) {
        $company = company::where("id",$id)->first();
        return view("edit_company", compact("company"));
        } else{
            return view("login");
        }
    }

    public function delete(Request $request)
    {
        $company = company::find($request->id_company);
        if(is_null($company)){
            return response()->json(["status" => "ERROR"]);

        }
        else{
            $company->delete();
            return response()->json(["status" => "SUCCESS"]);

        }
    }

}
