<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacoes', function (Blueprint $table) {
            
            $table->increments('id');

            $table->integer('contato_id')->unsigned();
            $table->foreign('contato_id')->references('id')->on('contatos');

            $table->string('numero_cotacao');
            $table->string('nome_contato_metal');
            $table->text('descricao_cotacao');
            $table->text('tolerancia');
            $table->text('observacao');

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
        Schema::drop('cotacoes');
    }
}
