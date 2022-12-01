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
        Schema::create('ajuste_stock', function (Blueprint $table) {
            $table->id();
            $table->date('fechaAjuste');
            $table->string('tipoAjuste',20);
            $table->tinyInteger('cantidadAjuste');
            $table->string('motivo',200);
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ajuste_stock');
    }
};
