<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;




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


