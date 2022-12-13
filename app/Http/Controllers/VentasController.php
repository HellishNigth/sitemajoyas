<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Cliente;
use App\Http\Requests\VentasRequest;

class VentasController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::orderBy('fechaVenta')->get();
        $productos = Producto::orderBy('nombreProd')->get();
        $clientes = Cliente::all();
        return view('ventas.index',compact('ventas','productos','clientes'));
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
        $venta = new Venta();
        $totalVenta = 0;
        $cantidad = 0;
        
        $venta->cantidad = $request->cantidad;
        $venta->cliente_id = $request->cliente;
        
        $venta->fechaVenta = $request->fechaVenta;
        
        $producto = Producto::findOrFail($request->producto);
        $cantidadProd = $producto->cantidadProd;
        $this->validate($request, [
            'cantidad' => 'required|gte:1|lte:' . $cantidadProd,
            'fechaVenta'=>'required|date_equals:today'
        ]);
        //foreach($producto as $prod){
        $totalVenta += $request->cantidad * $producto->precioProd;
        //}
        //return $totalVenta;

        $venta->totalVenta = $totalVenta;
        $venta->save();
        $venta->productos()->attach($request->producto);
        $venta->productos()->sync($request->producto);
        $producto = Producto::findOrFail($request->producto);
        $cantidadVenta = $producto->cantidadProd - $request->cantidad;
        //$cantidad = ($producto->cantidadProd - $request->cantidad);
        $producto->update(["cantidadProd" => $cantidadVenta]);
        
        return redirect()->route('ventas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
