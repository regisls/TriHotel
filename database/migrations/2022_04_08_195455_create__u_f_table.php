<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUFTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UF', function (Blueprint $table) {
            $table->id();
            $table->string('Sigla', 2);
            $table->string('Nome', 50);
            $table->string('CodigoIBGE', 2);
            $table->unsignedBigInteger('PaisId');
            $table->timestamps();
            
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
        Schema::dropIfExists('UF');
    }
}
