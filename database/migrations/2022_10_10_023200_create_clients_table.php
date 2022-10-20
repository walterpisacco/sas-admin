<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('cuit')->unique();
            $table->string('nombre');
            $table->string('razon_social')->nullable();
            $table->string('direccion')->nullable();
            $table->unsignedBigInteger('id_pais');
            $table->integer('estado')->default(1);
            $table->timestamps();
            $table->softDeletes();
          //  $table->foreign('id_pais')->references('id')->on('paises');         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
