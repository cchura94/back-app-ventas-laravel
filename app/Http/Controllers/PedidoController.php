<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::All();
        return response()->json($pedidos, 200);
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
        /*
        productos [
            {prod_id: 3, cantidad: 2},
            {prod_id: 2, cantidad: 1},
            {prod_id: 4, cantidad: 3}
            ] 
        cliente: cliente_id
        pedido: {fecha_ped, clie}
            */
        $ped = new Pedido;
        $ped->fecha_pedido = date("Y-m-d");
        $ped->monto_total = $request->monto_total;
        $ped->cod_factura = $request->cod_factura;
        $ped->cliente_id = $request->cliente_id;
        $ped->save();

        // Agreamos los producto al pedido
        foreach ($request->productos as $prod) {
            # carrito
            $ped->productos()->attach($prod["prod_id"], ['cantidad' => $prod["cantidad"]]);
        }

        return response()->json(["mensaje" => "Pedido Registrado"], 200);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function prod_masvendido()
    {
        # code...
    }
    
}
