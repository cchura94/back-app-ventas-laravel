<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->datetime("fecha_pedido");
            $table->decimal("monto_total")->default(0);
            $table->string("cod_factura", 20)->nullable();
            $table->bigInteger("cliente_id")->unsigned();
            
            $table->foreign("cliente_id")->references("id")->on("clientes");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
