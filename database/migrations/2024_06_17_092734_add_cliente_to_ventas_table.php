<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClienteToVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('cliente'); // Columna cliente
            $table->unsignedBigInteger('inventario_id'); // Agrega la clave foránea
            $table->foreign('inventario_id')->references('id')->on('inventarios');
            $table->integer('cantidad');
            $table->decimal('preciounitario', 8, 2);
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
        Schema::table('ventas', function (Blueprint $table) {
            //
        });
    }
}
