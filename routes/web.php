<?php

use App\Http\Controllers\Edit_UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
#Login
Route::post('validar', "loginController@validar")->name("validar");
#Vistas Home
Route::get('Bienvenido', "userController@bienvenido");
Route::get('home', "userController@home");
Route::get('home_client', "ClientController@frmClient");
Route::get('home_client', "ClientController@home_client");
Route::get('home_people', "peopleController@frmPeople");
Route::get('home_people', "peopleController@home_people");
Route::get('home_empresas', "CompanyController@Vista");
Route::get('home_empresas', "CompanyController@home_Company");
Route::get('home_oficinas', "OfficeController@Vista");
Route::get('home_oficinas', "OfficeController@home_Office");
Route::get('home_proveedores', "ProveedoresController@Vista");
Route::get('home_proveedores', "ProveedoresController@home_Proveedores");

#PDF
Route::get('Reporte_Ventas', "ReportesPDFController@Vista")->name('vista');
Route::get('Ayuda', "ReportesPDFController@Ayuda")->name('PDF');
Route::get('Reporte_Venta_Dia', "ReportesPDFController@ReporteVentaDia")->name('PDFVENTADIA');
Route::get('Reporte_Venta_Semana', "ReportesPDFController@ReporteVentSem")->name('PDFVENTASEM');
Route::get('Reporte_Inventarios', "ReportesPDFController@ReporteInvent")->name('PDFINVENT');

#Acciones Perfil
Route::get('perfil/vista', "PerfilController@Perfil");
Route::post("savePerfil", "PerfilController@guardar")->name("savePerfil");
Route::get('perfil/edit/{id}', "PerfilController@Vista");
#Usuario
Route::post('saveUser', "userController@guardar")->name("saveUser");
Route::get('user/edit/{id}', "userController@Vista");
Route::post("user/delete", "userController@delete");
Route::post("user/new", "userController@new");
#Personas
Route::post("people/new", "peopleController@newpeople");
Route::post('savePeople', "peopleController@guardar")->name("savePeople");
Route::get('people/edit/{id}', "peopleController@Vista");
Route::post("people/delete", "peopleController@delete");
#Clientes
Route::post("client/new", "ClientController@newclient");
Route::post('saveClient', "ClientController@guardar")->name("saveClient");
Route::get('client/edit/{id}', "ClientController@Vista");
Route::post("client/delete", "ClientController@delete");
#Caja
Route::get('caja/guardar', "CajaController@guardar")->name("saveBox");
Route::post("caja/cerra", "CajaController@closecaja");
Route::post("caja/monto", "CajaController@montocaja");
#Ventas
Route::post('product/search', "inventarioController@search");
Route::post('venta/guardar', "VentasController@guardarVenta");
Route::get('home_ventas', "VentasController@homeVentas");
Route::get('home_ventas', "VentasController@Vista");
Route::post('venta/grafica', "VentasController@VentasGraficas");
#Almacen
Route::post("inventario/new", "inventarioController@newInventario");
Route::post('saveInventario', "inventarioController@guardar")->name("saveInventario");
Route::get('inventario/edit/{id}', "inventarioController@Vista");
Route::post("inventario/delete", "inventarioController@delete");
Route::post("inventario/Salida", "inventarioController@Salida");
Route::get('home_almacen', "inventarioController@homeAlmacen");
#Empresa
Route::post("company/new", "CompanyController@newcompany");
Route::post('saveCompany', "CompanyController@guardar")->name("saveCompany");
Route::get('company/edit/{id}', "CompanyController@Vista1");
Route::post("company/delete", "CompanyController@delete");
#Oficina
Route::post("office/new", "OfficeController@newOffice");
Route::post('saveOffice', "OfficeController@guardar")->name("saveOffice");
Route::get('office/edit/{id}', "OfficeController@Vista1");
Route::post("office/delete", "OfficeController@delete");
#Proveedor
Route::post("proveedor/new", "ProveedoresController@newproveedor");
Route::post('saveProveedor', "ProveedoresController@guardar")->name("saveProveedor");
Route::get('proveedor/edit/{id}', "ProveedoresController@Vista1");
Route::post("proveedor/delete", "ProveedoresController@delete");
#Logout
Route::get('userlogout', "loginController@logout");









