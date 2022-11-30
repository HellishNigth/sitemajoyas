<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_producto', function (Blueprint $table) {
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('compra_id');
            $table->primary(['producto_id','compra_id']);

            //otros campos
            $table->unsignedSmallInteger('cantidad_compra');
            $table->unsignedInteger('precioCompra');

            //relaciones
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('compra_id')->references('id')->on('compras');
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
        Schema::dropIfExists('compra_producto');
    }
};
