<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Http\Requests\ProveedoresRequest;
use App\Http\Requests\ProveedoresEditarRequest;

class ProveedoresController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $proveedores = Proveedor::all();
        return view('proveedores.index',compact('proveedores'));
    }

    public function store(ProveedoresRequest $request){
        $proveedor = new Proveedor();
        $proveedor->rut_proveedor = $request->rut_proveedor;
        $proveedor->nombreProv = $request->nombreProv;
        $proveedor->apellidoProv = $request->apellidoProv;
        $proveedor->direccionProv = $request->direccionProv;
        $proveedor->emailProv = $request->emailProv;
        $proveedor->telefonoProv = $request->telefonoProv;
        $proveedor->save();
        return redirect()->route('proveedores.index');
    }

    public function edit(Proveedor $proveedor){
        return view('proveedores.edit',compact('proveedor'));
    }

    public function update(Proveedor $proveedor,ProveedoresEditarRequest $request){
        $proveedor->rut_proveedor = $request->rut_proveedor;
        $proveedor->nombreProv = $request->nombreProv;
        $proveedor->apellidoProv = $request->apellidoProv;
        $proveedor->direccionProv = $request->direccionProv;
        $proveedor->emailProv = $request->emailProv;
        $proveedor->telefonoProv = $request->telefonoProv;
        $proveedor->save();
        return redirect()->route('proveedores.index');
    }

    public function destroy(Proveedor $proveedor){
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}