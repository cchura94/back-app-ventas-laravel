<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
//use Mail;

Route::get('/', function () {
    return view('welcome');
})->name("mi_ruta");

Route::get("/prueba", function(){
    return response()->json([], 200);
}); 

Route::get("/enviar_correo", function(){
    return view("correo");
});

Route::post("/correo", function(Request $request){
    
    // aqui envias el correo
    /*Mail::send('email',$request->all(), function($msj) use($subject,$for){
        $msj->from("tucorreo@gmail.com","NombreQueApareceráComoEmisor");
        $msj->subject($subject);
        $msj->to($for);
    });*/
    return $request;
});