+<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('contribuinte_icms');//se o cliente for contribuinte do icms deve ter a Inscrição estadual informada
            $table->string('inscricao_estadual');
            $table->string('suframa');//obrigatório eem operações que se benefeciam de icentivos fiscais
            $table->string('inscricao_municipal');
            $table->string('email');
            //deve ser informado apenas um cpf, cnpj, ou idEstrangeiro
            $table->string('cnpj');
            $table->string('cpf');
            $table->string('idEstrangeiro');
            //fk
            $table->integer('endereco_id');
            $table->integer('empresa_id');
            $table->integer('usuario_id');
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
        Schema::dropIfExists('cliente');
    }
}
