<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('cpf');
            $table->string('logradouro');
            $table->string('pais');
            $table->string('cep');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('numero');
            $table->boolean('status')->nullable();
            $table->boolean('servicos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
