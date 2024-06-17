<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            //es para conectarme con categorias
            $table->integer('idcategoria')->unsigned();
            $table->string('codigo',70)->nullable();
            $table->string('nombre',100)->unique();
            $table->decimal('precio_venta',15,2);
            $table->integer('stock');
            $table->string('descripcion',256)->nullable();
            $table->boolean('condicion')->default(1);
            $table->timestamps();
            //conecta con la tabla categorias
            $table->foreign('idcategoria')->references('id')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
