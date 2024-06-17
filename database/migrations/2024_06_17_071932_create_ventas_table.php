<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('cliente'); // Columna cliente
            $table->unsignedBigInteger('inventario_id'); // Agrega la clave foránea
            $table->foreign('inventario_id')->references('id')->on('inventarios');
            $table->integer('cantidad');
            $table->decimal('preciounitario', 10, 2);
            $table->timestamps();
            $table->foreign('transaccion_id')->references('id')->on('transacciones')->onDelete('cascade');
            $table->foreign('inventario_id')->references('id')->on('inventarios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
