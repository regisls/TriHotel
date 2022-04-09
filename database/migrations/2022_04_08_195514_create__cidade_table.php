<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cidade', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 100);
            $table->unsignedBigInteger('UFId');
            $table->string('CodigoIBGE', 10);
            $table->unsignedBigInteger('PaisId');
            $table->timestamps();

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
        Schema::dropIfExists('Cidade');
    }
}
