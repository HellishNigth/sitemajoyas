<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AjusteStock;
use App\Models\Producto;

class AjustesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $ajustes = AjusteStock::all();
        $productos = Producto::all();
        return view('ajustes.index',compact('ajustes','productos'));
    }

    public function store(Request $request)
    {
        $ajuste = new AjusteStock();

        $ajuste->fechaAjuste = $request->fechaAjuste;
        $ajuste->tipoAjuste = $request->tipoAjuste;
        $ajuste->cantidadAjuste = $request->cantidadAjuste;
        $ajuste->motivo = $request->motivo;
        $ajuste->producto_id = $request->producto_id;
    
        $producto = Producto::findOrFail($request->producto_id);
        $cantidadProd = $producto->cantidadProd;
        if($request->tipoAjuste == "Aumento"){
            $this->validate($request, [
                'fechaAjuste'=>'required|date_equals:today',
                'tipoAjuste'=>'required',
                'cantidadAjuste' => 'required|gte:1',
                'motivo'=>'required|min:5|max:100',
                'producto_id'=>'required'
            ]);  
        }else if($request->tipoAjuste == "Disminucion"){
            $this->validate($request, [
                'fechaAjuste'=>'required|date_equals:today',
                'tipoAjuste'=>'required',
                'cantidadAjuste' => 'required|gte:1|lte:' . $cantidadProd,
                'motivo'=>'required|min:5|max:100',
                'producto_id'=>'required'
            ]);
        }
      
        $ajuste->save();
        // $ajuste->productos()->attach($request->producto_id);
        // $ajuste->productos()->sync($request->producto_id);
        $producto = Producto::findOrFail($request->producto_id);
        if($request->tipoAjuste == "Aumento"){
            $cantidadAjuste = $producto->cantidadProd + $request->cantidadAjuste;
            $producto->update(["cantidadProd" => $cantidadAjuste]);

        }else if($request->tipoAjuste == "Disminucion"){
            $cantidadAjuste = $producto->cantidadProd - $request->cantidadAjuste;
            $producto->update(["cantidadProd" => $cantidadAjuste]);

        }    
        return redirect()->route('ajustes.index');
    }

    public function destroy(AjusteStock $ajuste)
    {
        $ajuste->delete();
        return redirect()->route('ajustes.index');
    }
}
