<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ventas;
use App\Models\caja;
use App\Models\inventario;
use App\Models\user;


class VentasController extends Controller
{
    public function homeVentas()
    {
        return view("home_Ventas");
    }

    public function Vista(Request $request)
    {
        if ($request->session()->has('key')) {
            $id_user = $request->session()->get('id_user');
            $perfil = User::where("id", $id_user)->first();

            $cargos = caja::select("*")->get();
            $cargos = $cargos->reject(function ($cargo) {
                return $cargo->Cargo === null;
            })->map(function ($cargo) {
                $cargo->Cargo = $cargo->Cargo;
                return $cargo;
            });

            $ventas = ventas::select("*")->get();
            $ventas = $ventas->reject(function ($venta) {
                return $venta->caja === null || $venta->producto === null;
            })->map(function ($venta) {
                $venta->caja = $venta->caja;
                $venta->producto = $venta->producto;
                return $venta;
            });
            $id_caja = $request->session()->get('id_caja');
            $caja = caja::find($id_caja);
            return view("home_Ventas", compact(["ventas", "caja", "cargos", "perfil"]));
        } else {
            return view("login");
        }
    }

    public function guardarVenta(Request $request)
    {

        $id_caja = $request->session()->get('id_caja');
        $num_ventas = 0;

        foreach ((array)$request->ventas as $venta_) {
            $id_producto = $venta_['id'];
            $cantidad = $venta_['cantidad'];

            $producto = inventario::find($id_producto);

            $monto = (float)$producto->precio_unitario * (int)$cantidad;

            /**PRODUCTO INVENTARIO */
            $producto->cantidad = (int)$producto->cantidad - (int)$cantidad;
            $producto->save();

            $dt = new \DateTime();
            $venta = new ventas();

            $venta->id_inventario = $id_producto;
            $venta->cantidad = $cantidad;
            $venta->id_caja = $id_caja;
            $venta->monto = $monto;
            $venta->DateVenta = $dt->format('Y-m-d');

            $venta->save();
            $venta->refresh();

            if (!is_null($venta)) {
                $num_ventas++;
            }

            #return response()->json(["status" => "SUCCESS", "message" => $venta]);
        }

        return response()->json(["status" => "SUCCESS", "message" => $num_ventas . " se realizarón correctamente"]);
    }

    public function VentasGraficas(Request $request)
    {
        $Periodo = $request->periodo;
        $fecha_final = null;
        $fecha_inicial = null;
        switch ($Periodo) {
            case 'ULTIMO_MES':
                $fecha_actual = date("Y-m-d");
                $fecha_inicial = date("Y-m-01", strtotime($fecha_actual . "- 1 month"));
                $fecha_final = date("Y-m-t", strtotime($fecha_actual . "- 1 month"));
                break;

            case 'ULTIMA_SEMANA':
                $fecha_final = date("Y-m-d");
                $fecha_inicial = date("Y-m-d", strtotime($fecha_final . "- 1 week"));
                break;

            case 'ULTIMO_DIA':
                $fecha_actual = date("Y-m-d");
                $fecha_inicial = date("Y-m-d", strtotime($fecha_actual . "- 1 days"));
                $fecha_final = $fecha_inicial;
                break;

            default:
                # code...
                break;
        }
        $Ventas = ventas::selectRaw('SUM(monto) as total, DateVenta as fecha_venta')->whereBetween('DateVenta', [$fecha_inicial, $fecha_final])->groupBy('DateVenta')->get();

        $comienzo = new \DateTime($fecha_inicial);
        $final = new \DateTime($fecha_final);
        // Necesitamos modificar la fecha final en 1 día para que aparezca en el bucle
        $final = $final->modify('+1 day');

        $intervalo = \DateInterval::createFromDateString('1 day');
        $periodo = new \DatePeriod($comienzo, $intervalo, $final);

        $ventas_detalle = collect();
        foreach ($periodo as $dt) {
            $fecha = $dt->format("Y-m-d");

            if($Ventas->where("fecha_venta", $fecha)->count() == 0){
                $ventas_detalle->push(["fecha_venta" => $fecha, "total" => 0.00]);
            }
            else{
                $ventas_detalle->push($Ventas->where("fecha_venta", $fecha)->first());
            }
        }

        return response()->json(["status" => "SUCCESS", "message" => $periodo, "Ventas" => $ventas_detalle]);
    }
}
