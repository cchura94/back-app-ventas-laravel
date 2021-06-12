<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::get();
        return response()->json($clientes, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validar
        $request->validate([
            "nombre_completo" => "required",
            "ci_nit" => "required",
            "correo" => "required",
        ]);
        //guardar
        $cliente = new Cliente;
        $cliente->nombre_completo = $request->nombre_completo;
        $cliente->ci_nit = $request->ci_nit;
        $cliente->correo = $request->correo;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        return response()->json(["mensaje" => "Cliente registrado", "cliente" => $cliente], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return response()->json($cliente, 200);
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            "nombre_completo" => "required",
            "ci_nit" => "required"
        ]);
        //guardar
        $cliente = Cliente::find($id);
        $cliente->nombre_completo = $request->nombre_completo;
        $cliente->ci_nit = $request->ci_nit;
        $cliente->correo = $request->correo;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        return redirect()->json(["mensaje" => "Cliente Modificado", "cliente" => $cliente], 200);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->json(["mensaje" => "Cliente Eliminado"], 200);
   
    }
}
