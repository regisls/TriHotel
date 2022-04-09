<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Unidade', function (Blueprint $table) {
            $table->id();
            $table->string('CNPJ', 20);
            $table->string('RazaoSocial', 200);
            $table->string('NomeFantasia', 200);
            $table->string('CEP', 10);
            $table->string('Endereco', 200);
            $table->string('Numero', 10);
            $table->string('Complemento', 200);
            $table->string('Bairro', 200);
            $table->unsignedBigInteger('CidadeId');
            $table->string('Telefone', 20);
            $table->string('Email', 200);
            $table->string('InscricaoEstadual', 20);
            $table->string('InscricaoMunicipal', 20);
            $table->boolean('Ativo');
            $table->timestamps();

            $table->foreign('CidadeId')->references('Id')->on('Cidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Unidade');
    }
}
