<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select * from productos
        $productos = Producto::paginate(5);

        return response()->json($productos, 200);
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
            "nombre" => "required|max:200|min:3",
            "categoria_id" => "required|exists:categorias,id",
            // "imagen" => "file"
        ]);
        // Subir Imagen
        $nombre_imagen = "";
        if($file = $request->file("imagen")){
            $nombre_imagen = time()."-".$file->getClientOriginalName();
            $file->move("imagenes", $nombre_imagen);
            
        }
        // guardar
        $prod = new producto;
        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->cantidad = $request->cantidad;
        $prod->descripcion = $request->descripcion;
        $prod->categoria_id = $request->categoria_id;
        $prod->imagen = $nombre_imagen;
        $prod->save();

        // responder
        return response()->json(["mensaje" => "Producto Registrado"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return response()->json($producto, 200);
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
        //return $request;
        // validar
        $request->validate([
            "nombre" => "required|max:200|min:3",
            "categoria_id" => "required|exists:categorias,id",
            // "imagen" => "file"
        ]);
        
        // guardar
        $prod = Producto::find($id);
        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->cantidad = $request->cantidad;
        $prod->descripcion = $request->descripcion;
        $prod->categoria_id = $request->categoria_id;

        // Subir Imagen
        $nombre_imagen = "";
        if($file = $request->file("imagen")){
            $nombre_imagen = time()."-".$file->getClientOriginalName();
            $file->move("imagenes", $nombre_imagen);

            $prod->imagen = $nombre_imagen;
        }
        
        $prod->save();

        // responder
        return response()->json(["mensaje" => "Producto Modificado"], 200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return response()->json(["mensaje" => "Producto Eliminado"], 200);
    }
}
