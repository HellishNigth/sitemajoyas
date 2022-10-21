<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClientesRequest;

class ClientesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index',compact('clientes'));
    }

    public function store(ClientesRequest $request){
        $cliente = new Cliente();
        $cliente->rut_cliente = $request->rut_cliente;
        $cliente->nombreClie = $request->nombreClie;
        $cliente->apellidoClie = $request->apellidoClie;
        $cliente->direccionClie = $request->direccionClie;
        $cliente->emailClie = $request->emailClie;
        $cliente->telefonoClie = $request->telefonoClie;
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    public function edit(Cliente $cliente){
        return view('clientes.edit',compact('cliente'));
    }

    public function update(Cliente $cliente,Request $request){
        $cliente->rut_cliente = $request->rut_cliente;
        $cliente->nombreClie = $request->nombreClie;
        $cliente->apellidoClie = $request->apellidoClie;
        $cliente->direccionClie = $request->direccionClie;
        $cliente->emailClie = $request->emailClie;
        $cliente->telefonoClie = $request->telefonoClie;
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente){
        $cliente->delete();
        return redirect()->route('clientes.index');
    }

}
