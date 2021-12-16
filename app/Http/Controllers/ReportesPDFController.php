<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\inventario;
use App\Models\ventas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use PDF;


class ReportesPDFController extends Controller
{
    public function Vista(Request $request)
    {
        if ($request->session()->has('key')) {
            return view("Reporte_Ventas");
        } else {
            return view("login");
        }
    }

    public function Ayuda()
    {
        $Imag1 = public_path('/image/Pantalla Usuario.jpg');
        $Imag2 = public_path('/image/Registro Usuario.jpg');
        $Imag3 = public_path('/image/Formulario Usuario.png');
        $Imag4 = public_path('/image/Editar Usuario.jpg');
        $Imag5 = public_path('/image/Vista Editar.png');
        $Imag6 = public_path('/image/Eliminacion Usuario.jpg');
        $Imag7 = public_path('/image/Vista Eliminar Usuario.png');
        $Imag8 = public_path('/image/Regreso Menu.jpg');
        $Imag9 = public_path('/image/Vista Personas.jpg');
        $Imag10 = public_path('/image/Registrar Personas.jpg');
        $Imag11 = public_path('/image/Registro Personas.png');
        $Imag12 = public_path('/image/Vista Editar Persona.jpg');
        $Imag13 = public_path('/image/Editar Personas.png');
        $Imag14 = public_path('/image/Vista Eliminar Personas.jpg');
        $Imag15 = public_path('/image/Eliminar Personas.png');
        $Imag16 = public_path('/image/Vista Clientes.jpg');
        $Imag17 = public_path('/image/Agregar Clientes.jpg');
        $Imag18 = public_path('/image/Agregar Cliente.png');
        $Imag19 = public_path('/image/Vista Editar Clientes.jpg');
        $Imag20 = public_path('/image/Editar Cliente.png');
        $Imag21 = public_path('/image/Vista Eliminar Clientes.jpg');
        $Imag22 = public_path('/image/Eliminar Cliente.png');
        $Imag23 = public_path('/image/Vista Ventas.jpg');
        $Imag24 = public_path('/image/Aperturar Caja.jpg');
        $Imag25 = public_path('/image/Busqueda Ventas.jpg');
        $Imag26 = public_path('/image/Seleccion de Productos.jpg');
        $Imag27 = public_path('/image/Recarga Ventas.png');
        $Imag28 = public_path('/image/Vista Cerrar Caja.jpg');
        $Imag29 = public_path('/image/Cerrar Caja.png');
        $Imag30 = public_path('/image/Recarga Apertura.png');
        $Imag31 = public_path('/image/Vista Reportes Graficos.jpg');
        $Imag32 = public_path('/image/Reportes de Venta.png');
        $Imag33 = public_path('/image/Reportes Ultimo Mes.jpg');
        $Imag34 = public_path('/image/Seleccion Boton Ultima.jpg');
        $Imag35 = public_path('/image/Reporte Ultima Semana.png');
        $Imag36 = public_path('/image/Boton Ultimo Dia.jpg');
        $Imag37 = public_path('/image/Vista Ultimo Dia.png');
        $Imag38 = public_path('/image/Regreso Caja Apertura.jpg');
        $Imag39 = public_path('/image/Reporte Semanal PDF.jpg');
        $Imag40 = public_path('/image/Reporte Semanal PDF.png');
        $Imag41 = public_path('/image/Boton Dia PDF.jpg');
        $Imag42 = public_path('/image/Reporte Diario Ventas.png');
        $Imag43 = public_path('/image/Vista Almacen.jpg');
        $Imag44 = public_path('/image/Registrar Producto.jpg');
        $Imag45 = public_path('/image/Vista Registro Producto.png');
        $Imag46 = public_path('/image/Vista Editar Producto.jpg');
        $Imag47 = public_path('/image/Editar Producto.png');
        $Imag48 = public_path('/image/Vista Eliminar Producto.jpg');
        $Imag49 = public_path('/image/Eliminar Producto.png');
        $Imag50 = public_path('/image/Boton Eliminar Producto.jpg');
        $Imag51 = public_path('/image/Boton Fecha Producto.jpg');
        $Imag52 = public_path('/image/Vista Reporte PDF.jpg');
        $Imag53 = public_path('/image/Reporte PDF.png');
        $Imag54 = public_path('/image/Vista Empresas.jpg');
        $Imag55 = public_path('/image/Vista Registrar Empresa.jpg');
        $Imag56 = public_path('/image/Registrar Empresa.png');
        $Imag57 = public_path('/image/Vista Editar Empresas.jpg');
        $Imag58 = public_path('/image/Editar Empresa.png');
        $Imag59 = public_path('/image/Vista Eliminar Empresa.jpg');
        $Imag60 = public_path('/image/Eliminar Empresa.jpg');
        $Imag61 = public_path('/image/Vista Oficinas.jpg');
        $Imag62 = public_path('/image/Vista Registrar Oficina.jpg');
        $Imag63 = public_path('/image/Registro Oficina.png');
        $Imag64 = public_path('/image/Vista Editar Oficina.jpg');
        $Imag65 = public_path('/image/Editar Oficina.png');
        $Imag66 = public_path('/image/Vista Eliminar Oficina.jpg');
        $Imag67 = public_path('/image/Eliminar Oficina.png');
        $Imag68 = public_path('/image/Vista Proveedores.jpg');
        $Imag69 = public_path('/image/Boton Registrar Proveedor.jpg');
        $Imag70 = public_path('/image/Registrar Proveedores.png');
        $Imag71 = public_path('/image/Vista Editar Proveedores.jpg');
        $Imag72 = public_path('/image/Editar Proveedores.png');
        $Imag73 = public_path('/image/Vista Eliminar Proveedores.jpg');
        $Imag74 = public_path('/image/Eliminar Proveedores.png');
        $Imag75 = public_path('/image/Boton Eliminar Proveedor.jpg');
        $Imag76 = public_path('/image/Boton Habilitar Proveedor.jpg');
        $Imag77 = public_path('/image/Vista Perfil.jpg');
        $Imag78 = public_path('/image/Vista Muestra Perfil.png');
        $Imag79 = public_path('/image/Boton Editar Perfil.jpg');
        $Imag80 = public_path('/image/Editar Perfil.png');
        $Imag81 = public_path('/image/Boton Menu.jpg');
        $Imag82 = public_path('/image/Vista Ayuda.jpg');
        $Imag83 = public_path('/image/Ayuda.png');
        $view = \View::make('Ayuda', compact('Imag1', 'Imag2', 'Imag3', 'Imag4', 'Imag5', 'Imag6', 'Imag7', 'Imag8', 'Imag9', 'Imag10', 'Imag11', 'Imag12', 'Imag13', 'Imag14', 'Imag15'
    , 'Imag16', 'Imag17', 'Imag18', 'Imag19', 'Imag20', 'Imag21', 'Imag22', 'Imag23', 'Imag24', 'Imag25', 'Imag26', 'Imag27', 'Imag28', 'Imag29', 'Imag30', 'Imag31', 'Imag32', 'Imag33'
    , 'Imag34', 'Imag35', 'Imag36', 'Imag37', 'Imag38', 'Imag39', 'Imag40', 'Imag41', 'Imag42', 'Imag43', 'Imag44', 'Imag45', 'Imag46', 'Imag47', 'Imag48', 'Imag49', 'Imag50', 'Imag51'
    , 'Imag52', 'Imag53', 'Imag54', 'Imag55', 'Imag56', 'Imag57', 'Imag58', 'Imag59', 'Imag60', 'Imag61', 'Imag62', 'Imag63', 'Imag64', 'Imag65', 'Imag66', 'Imag67', 'Imag68', 'Imag69'
    , 'Imag70', 'Imag71', 'Imag72', 'Imag73', 'Imag74', 'Imag75', 'Imag76', 'Imag77', 'Imag78', 'Imag79', 'Imag80', 'Imag81', 'Imag82', 'Imag83'));
        $html = $view->render();

        $pdf = new TCPDF();
        $pdf::SetTitle('Ayuda');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output('Ayuda.pdf');
    }

    public function ReporteVentaDia()
    {
        $Ventas = ventas::whereDate('DateVenta', Carbon::today())->get();
        $Total_Precio = $Ventas->sum('monto');
        $Total_Producto = $Ventas->sum('cantidad');
        $Ventas = $Ventas->reject(function ($venta) {
            return $venta->producto === null;
        })->map(function ($venta) {
            $venta->producto = $venta->producto;
            return $venta;
        });


        $view = \View::make('Reporte_vent_day', compact('Ventas', 'Total_Precio', 'Total_Producto'));
        $html = $view->render();

        $pdf = new TCPDF();
        $pdf::SetTitle('Reporte Venta Día');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output('Reporte Venta Dia.pdf');
    }

    public function ReporteVentSem()
    {
        $fecha_final = date("Y-m-d");
        $fecha_inicial = date("Y-m-d", strtotime($fecha_final . "- 4 days"));
        $Ventas = ventas::whereBetween('DateVenta', [$fecha_inicial, $fecha_final])->get();
        $Total_Precio = $Ventas->sum('monto');
        $Total_Producto = $Ventas->sum('cantidad');
        $Ventas = $Ventas->reject(function ($venta) {
            return $venta->producto === null;
        })->map(function ($venta) {
            $venta->producto = $venta->producto;
            return $venta;
        });
        $Prim_5 = date("Y-m-d");
        $Prim_1 = date("Y-m-d", strtotime($Prim_5 . "- 4 days"));
        $Prim_2 = date("Y-m-d", strtotime($Prim_5 . "- 3 days"));
        $Prim_3 = date("Y-m-d", strtotime($Prim_5 . "- 2 days"));
        $Prim_4 = date("Y-m-d", strtotime($Prim_5 . "- 1 days"));

        $view = \View::make('Reporte_venta_sem', compact('Ventas', 'Total_Precio', 'Total_Producto', 'Prim_5', 'Prim_1', 'Prim_2', 'Prim_3', 'Prim_4'));
        $html = $view->render();

        $pdf = new TCPDF();
        $pdf::SetTitle('Reporte Venta Semana');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output('Reporte Venta Semana.pdf');
    }

    public function ReporteInvent()
    {
        $inventarios = inventario::select('inventario.id','inventario.Article', 'inventario.cantidad', 'inventario.date_in', 'inventario.date_out')->get();
        $ventas = ventas::select('ventas.id_inventario')->selectRAW('SUM(cantidad) as total')->groupBy('id_inventario')->get();
        $view = \View::make('Reporte_Invent', compact('inventarios', 'ventas'));
        $html = $view->render();

        $pdf = new TCPDF();
        $pdf::SetTitle('Reporte Inventario');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output('Reporte Inventario.pdf');
    }
}
