<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\AjustesController;
use App\Http\Controllers\EstadisticasController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///Route::get('/', function () {
///    return view('welcome');
///});

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/login',[HomeController::class,'login'])->name('home.login');

Route::get('/categorias',[CategoriasController::class,'index'])->name('categorias.index');
Route::post('/categorias',[CategoriasController::class, 'store'])->name('categorias.store');
Route::delete('/categorias/{categoria}',[CategoriasController::class, 'destroy'])->name('categorias.destroy');
Route::get('/categorias/{categoria}/edit',[CategoriasController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}',[CategoriasController::class, 'update'])->name('categorias.update');
Route::get('/categorias/{categoria}',[CategoriasController::class, 'show'])->name('categorias.show');



Route::get('/productos',[ProductosController::class,'index'])->name('productos.index');
Route::post('/productos',[ProductosController::class, 'store'])->name('productos.store');
Route::delete('/productos/{producto}',[ProductosController::class, 'destroy'])->name('productos.destroy');
Route::get('/productos/{producto}/edit',[ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}',[ProductosController::class, 'update'])->name('productos.update');



Route::post('/usuarios/login',[UsuariosController::class, 'login'])->name('usuarios.login');
Route::get('/usuarios/logout',[UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::post('/usuarios/{usuario}/activar',[UsuariosController::class, 'activar'])->name('usuarios.activar');
Route::resource('/usuarios',UsuariosController::class);

Route::resource('/roles',RolesController::class);

Route::get('/clientes',[ClientesController::class,'index'])->name('clientes.index');
Route::post('/clientes',[ClientesController::class, 'store'])->name('clientes.store');
Route::delete('/clientes/{cliente}',[ClientesController::class, 'destroy'])->name('clientes.destroy');
Route::get('/clientes/{cliente}/edit',[ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}',[ClientesController::class, 'update'])->name('clientes.update');

Route::get('/proveedores',[ProveedoresController::class,'index'])->name('proveedores.index');
Route::post('/proveedores',[ProveedoresController::class, 'store'])->name('proveedores.store');
Route::delete('/proveedores/{proveedor}',[ProveedoresController::class, 'destroy'])->name('proveedores.destroy');
Route::get('/proveedores/{proveedor}/edit',[ProveedoresController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{proveedor}',[ProveedoresController::class, 'update'])->name('proveedores.update');

Route::get('/ventas',[VentasController::class,'index'])->name('ventas.index');
Route::post('/ventas/store',[VentasController::class, 'store'])->name('ventas.store');
Route::delete('/ventas/{venta}',[VentasController::class, 'destroy'])->name('ventas.destroy');

Route::get('/compras',[ComprasController::class,'index'])->name('compras.index');
Route::post('/compras/store',[ComprasController::class, 'store'])->name('compras.store');
Route::delete('/compras/{compra}',[ComprasController::class, 'destroy'])->name('compras.destroy');

Route::get('/ajustes',[AjustesController::class,'index'])->name('ajustes.index');
Route::post('/ajustes/store',[AjustesController::class, 'store'])->name('ajustes.store');
Route::delete('/ajustes/{ajuste}',[AjustesController::class, 'destroy'])->name('ajustes.destroy');

Route::get('/estadisticas/stock',[EstadisticasController::class,'stockProductos'])->name('estadisticas.stock');
Route::get('/estadisticas/descargar-stock',[EstadisticasController::class,'descargarStockProductos'])->name('estadisticas.descargar-stock');

Route::get('/estadisticas/reporte',[EstadisticasController::class,'reporteMensual'])->name('estadisticas.reporte');
Route::get('/estadisticas/descargar-reporte',[EstadisticasController::class,'descargarReporteMensual'])->name('estadisticas.descargar-reporte');

Route::get('/estadisticas/reporte/noviembre',[EstadisticasController::class,'reporteMensualNoviembre'])->name('estadisticas.noviembre');
Route::get('/estadisticas/descargar-reporte-noviembre',[EstadisticasController::class,'descargarReporteNoviembre'])->name('estadisticas.descargar-reporte-noviembre');

Route::get('/estadisticas/reporte/diciembre',[EstadisticasController::class,'reporteMensualDiciembre'])->name('estadisticas.diciembre');
Route::get('/estadisticas/descargar-reporte-diciembre',[EstadisticasController::class,'descargarReporteDiciembre'])->name('estadisticas.descargar-reporte-diciembre');

Route::get('/estadisticas/reporte/enero',[EstadisticasController::class,'reporteMensualEnero'])->name('estadisticas.enero');
Route::get('/estadisticas/descargar-reporte-enero',[EstadisticasController::class,'descargarReporteEnero'])->name('estadisticas.descargar-reporte-enero');

Route::get('/estadisticas/reporte/febrero',[EstadisticasController::class,'reporteMensualFebrero'])->name('estadisticas.febrero');
Route::get('/estadisticas/descargar-reporte-febrero',[EstadisticasController::class,'descargarReporteFebrero'])->name('estadisticas.descargar-reporte-febrero');

Route::get('/estadisticas/reporte/marzo',[EstadisticasController::class,'reporteMensualMarzo'])->name('estadisticas.marzo');
Route::get('/estadisticas/descargar-reporte-marzo',[EstadisticasController::class,'descargarReporteMarzo'])->name('estadisticas.descargar-reporte-marzo');

Route::get('/estadisticas/reporte/abril',[EstadisticasController::class,'reporteMensualAbril'])->name('estadisticas.abril');
Route::get('/estadisticas/descargar-reporte-abril',[EstadisticasController::class,'descargarReporteAbril'])->name('estadisticas.descargar-reporte-abril');

Route::get('/estadisticas/reporte/mayo',[EstadisticasController::class,'reporteMensualMayo'])->name('estadisticas.mayo');
Route::get('/estadisticas/descargar-reporte-mayo',[EstadisticasController::class,'descargarReporteMayo'])->name('estadisticas.descargar-reporte-mayo');

Route::get('/estadisticas/reporte/junio',[EstadisticasController::class,'reporteMensualJunio'])->name('estadisticas.junio');
Route::get('/estadisticas/descargar-reporte-junio',[EstadisticasController::class,'descargarReporteJunio'])->name('estadisticas.descargar-reporte-junio');

Route::get('/estadisticas/reporte/julio',[EstadisticasController::class,'reporteMensualJulio'])->name('estadisticas.julio');
Route::get('/estadisticas/descargar-reporte-julio',[EstadisticasController::class,'descargarReporteJulio'])->name('estadisticas.descargar-reporte-julio');

Route::get('/estadisticas/reporte/agosto',[EstadisticasController::class,'reporteMensualAgosto'])->name('estadisticas.agosto');
Route::get('/estadisticas/descargar-reporte-agosto',[EstadisticasController::class,'descargarReporteAgosto'])->name('estadisticas.descargar-reporte-agosto');

Route::get('/estadisticas/reporte/septiembre',[EstadisticasController::class,'reporteMensualSeptiembre'])->name('estadisticas.septiembre');
Route::get('/estadisticas/descargar-reporte-septiembre',[EstadisticasController::class,'descargarReporteSeptiembre'])->name('estadisticas.descargar-reporte-septiembre');

Route::get('/estadisticas/reporte/octubre',[EstadisticasController::class,'reporteMensualOctubre'])->name('estadisticas.octubre');
Route::get('/estadisticas/descargar-reporte-octubre',[EstadisticasController::class,'descargarReporteOctubre'])->name('estadisticas.descargar-reporte-octubre');