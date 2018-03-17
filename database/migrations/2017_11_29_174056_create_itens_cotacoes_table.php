<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensCotacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_cotacoes', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('cotacao_id')->unsigned();
            $table->foreign('cotacao_id')->references('id')->on('cotacoes');

            $table->string('item_desc');
            $table->string('quantidade');
            $table->string('unidade');
            $table->decimal('valor',8,2);
            
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
        Schema::drop('itens_cotacoes');
    }
}
