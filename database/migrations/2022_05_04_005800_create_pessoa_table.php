<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pessoa', function (Blueprint $table) {
            $table->id();
            $table->string('NomeCompleto', 200);
            $table->string('Nacionalidade', 100);
            $table->string('TipoPessoa', 1);
            $table->boolean('IsExtrangeiro');
            $table->integer('TipoDocumentoId')->unsigned();
            $table->string('NumeroDocumento', 20);
            $table->string('OrgaoExpedidor', 20);
            $table->string('Email', 100);
            $table->string('CpfCnpj', 20);
            $table->string('Profissao', 100)->nullable();
            $table->date('DataNascimento');
            $table->string('Sexo', 1);
            $table->integer('GrupoPessoaId')->unsigned();
            $table->string('DDICelular', 4);
            $table->string('DDDCelular', 4);
            $table->string('TelefoneCelular', 20);
            $table->string('DDIFixo', 4)->nullable();
            $table->string('DDDFixo', 4)->nullable();
            $table->string('TelefoneFixo', 20)->nullable();
            $table->boolean('PermiteEmail');
            $table->boolean('PermiteSms');
            $table->boolean('PermiteWhatsapp');
            $table->string('CEP', 8);
            $table->string('Endereco', 200);
            $table->string('Numero', 20);
            $table->string('Complemento', 100)->nullable();
            $table->string('Bairro', 100)->nullable();
            $table->integer('CidadeId')->unsigned()->nullable();
            $table->integer('UFId')->unsigned()->nullable();
            $table->integer('PaisId')->unsigned()->nullable();
            $table->string('CidadeNome', 100)->nullable();
            $table->string('UFNome', 2)->nullable();
            $table->string('PaisNome', 100)->nullable();
            $table->timestamps();

            $table->foreign('TipoDocumentoId')->references('Id')->on('TipoDocumento');
            $table->foreign('GrupoPessoaId')->references('Id')->on('GrupoPessoa');
            $table->foreign('CidadeId')->references('Id')->on('Cidade');
            $table->foreign('UFId')->references('Id')->on('UF');
            $table->foreign('PaisId')->references('Id')->on('Pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pessoa');
    }
}
