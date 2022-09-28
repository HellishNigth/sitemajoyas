<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductosRequest;

class ProductosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('productos.index',compact('productos','categorias'));
    }

    public function store(ProductosRequest $request){
        $producto = new Producto();
        $producto->nombreProd = $request->nombreProd;
        $producto->descripcionProd = $request->descripcionProd;
        $producto->cantidadProd = $request->cantidadProd;
        $producto->precioProd = $request->precioProd;
        $producto->fechaIngreso = $request->fechaIngreso;
        $producto->imagen = $request->imagenProd->store('public/productos');
        $producto->categoria_id = $request->categoria;
        $producto->save();
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto){
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto){
        $categorias = Categoria::orderBy('nombreCat')->get();
        return view('productos.edit',compact('producto','categorias'));
    }

    public function update(Producto $producto,Request $request){
        $producto->nombreProd = $request->nombreProd;
        $producto->descripcionProd = $request->descripcionProd;
        $producto->cantidadProd = $request->cantidadProd;
        $producto->precioProd = $request->precioProd;
        $producto->fechaIngreso = $request->fechaIngreso;
        if(isset($request->imagenProd)){
            //borrar imagen actual
            Storage::delete($producto->imagen);
            //subir nueva imagen
            $producto->imagen = $request->imagenProd->store('public/productos');
        }
        $producto->categoria_id = $request->categoria;
        $producto->save();
        return redirect()->route('productos.index');
    }

}
