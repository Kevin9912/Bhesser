<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\caja;
use App\Models\User;
use Redirect;

class CajaController extends Controller
{
    public function guardar(Request $request)
    {

        $current_user = User::find($request->session()->get('id_user'));

        if (!is_null($current_user->cajaActiva)) {
            return Redirect::back()->withErrors(["El usuario cuenta con caja aperturada"]);
        } else {
            $dt = new \DateTime();
            $caja = new caja();
            $caja->monto_apertura = $request->monto_apertura;
            $caja->fecha_apertura = $dt->format('Y-m-d');
            $caja->id_user_cargo =  $current_user->id;
            $caja->status = "ABIERTO";
            $caja->save();
            $caja->refresh();

            if (!is_null($caja)) {
                $request->session()->put('id_caja', $caja->id);
                return Redirect::to('home_ventas');
            } else {

                return Redirect::back()->withErrors(["No se guardó"]);
            }
        }
    }

    public function closecaja(Request $request)
    {
        $Caja = caja::find($request->id_caja);
        
        if(is_null($Caja)){
            return response()->json(["status" => "ERROR"]);
        }
        else{
            $ventas = $Caja->ventas;
            $total_venta = $ventas->sum('monto');
            $dt = new \DateTime();
            $montoInicial = $Caja->monto_apertura;
            $monto_cierre = $montoInicial + $total_venta;
            $Caja->monto_cierre = $monto_cierre;
            $Caja->fecha_cierre = $dt->format('Y-m-d');
            $Caja->status = "CERRADO";
            $Caja->save();
            $Caja->refresh();
            if(!is_null($Caja)){
                $request->session()->put("id_caja", "");
            }
            return response()->json(["status" => "SUCCESS"]);
        }
    }
    public function montocaja(Request $request)
    {
        $Caja = caja::find($request->id_caja);
        
        if(is_null($Caja)){
            return response()->json(["status" => "error"]);
        }
        else{

            $ventas = $Caja->ventas;
            $total_venta = $ventas->sum('monto');
            return response()->json(["status" => "success", "caja" => $Caja, "ventas" => $ventas, "total" => $total_venta]);
        }
    }
    
    
}
