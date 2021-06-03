<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// /api/auth/login
Route::post("/auth/login", [AuthController::class, "login"]);
Route::post("/auth/logout", [AuthController::class, "logout"]);

Route::apiresource("categoria", CategoriaController::class);
Route::apiresource("producto", ProductoController::class);
Route::apiresource("pedido", PedidoController::class);
Route::apiresource("cliente", ClienteController::class);
Route::apiresource("usuario", UsuarioController::class);