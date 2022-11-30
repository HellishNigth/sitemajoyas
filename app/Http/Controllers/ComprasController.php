<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::orderBy('fechaCompra')->get();
        $productos = Producto::orderBy('nombreProd')->get();
        $proveedores = Proveedor::all();
        return view('compras.index',compact('compras','productos','proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = new Compra();
        $totalCompra = 0;
        $cantidad = 0;
        
        $compra->cantidad = $request->cantidad;
        $compra->proveedor_id = $request->proveedor;
        
        $compra->fechaCompra = $request->fechaCompra;
        
        $producto = Producto::findOrFail($request->producto);
        //$cantidadProd = $producto->cantidadProd;
        $this->validate($request, [
            'cantidad' => 'required|gte:1',
            'fechaCompra'=>'required|date_equals:today'
        ]);
        //foreach($producto as $prod){
        $totalCompra += $request->cantidad * $producto->precioProd;
        //}
        //return $totalVenta;

        $compra->totalCompra = $totalCompra;
        $compra->save();
        $compra->productos()->attach($request->producto);
        $compra->productos()->sync($request->producto);
        $producto = Producto::findOrFail($request->producto);
        $cantidadCompra = $producto->cantidadProd + $request->cantidad;
        //$cantidad = ($producto->cantidadProd - $request->cantidad);
        $producto->update(["cantidadProd" => $cantidadCompra]);
        
        return redirect()->route('compras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index');
    }
}
