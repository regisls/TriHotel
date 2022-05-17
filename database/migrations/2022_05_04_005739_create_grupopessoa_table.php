<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupopessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GrupoPessoa', function (Blueprint $table) {
            $table->id();
            $table->string('Descricao', 100);
            $table->boolean('Ativo');
            $table->boolean('IsColaborador');
            $table->boolean('IsHospede');
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
        Schema::dropIfExists('GrupoPessoa');
    }
}
