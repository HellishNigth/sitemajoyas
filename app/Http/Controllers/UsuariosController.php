<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gate;

class UsuariosController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('usuarios-listar')){
            return redirect()->route('home.index');
        }
        $usuarios = Usuario::all();
        $roles = Rol::all();
        return view('usuarios.index',compact('usuarios','roles'));
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
        $usuario = new Usuario();
        $usuario->email = $request->email;
        $usuario->nombre = $request->nombre;
        $usuario->password = Hash::make($request->password);
        $usuario->rol_id = $request->rol;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(Request $request){
        // $credenciales = $request->only('email','password');
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'activo'=>true])){
            //Correcto
            $usuario = Usuario::where('email',$request->email)->first();
            $usuario->registrarUltimoLogin();
            return redirect()->route('home.index');
        }else{
            //Incorrecto
            return back()->withErrors('Credenciales Incorrectas');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('home.login');
    }

    public function activar(Usuario $usuario){
        $usuario->activo = $usuario->activo?0:1;
        $usuario->save();
        return redirect()->route('usuarios.index');

    }
}
