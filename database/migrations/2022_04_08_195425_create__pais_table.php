<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pais', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 100);
            $table->string('Sigla', 2);
            $table->string('DDI', 3);
            $table->string('CodigoBacen', 10);
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
        Schema::dropIfExists('Pais');
    }
}
