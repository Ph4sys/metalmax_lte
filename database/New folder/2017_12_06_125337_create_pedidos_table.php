<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            
            $table->increments('id');

            $table->integer('cotacao_id')->unsigned();
            $table->foreign('cotacao_id')->references('id')->on('cotacoes');
            
            $table->integer('situacao_pedido_id')->unsigned();
            $table->foreign('situacao_pedido_id')->references('id')->on('situacoes_pedido');

            $table->string('numero_pedido');
            $table->string('numero_nf');
            $table->string('valor_pedido');
            $table->string('qtd_itens');

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
        Schema::drop('pedidos');
    }
}
