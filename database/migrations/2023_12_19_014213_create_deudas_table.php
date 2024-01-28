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
        Schema::create('deudas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_comerciante');
            $table->string('nro_documento');
            $table->string('nro_puesto');
            $table->float('monto_mensual_alquiler');
            $table->date('fecha_facturacion');
            $table->date('fecha_pago');
            $table->float('monto_pagado');
            $table->float('deuda_pendiente');
            $table->string('estado_pago');
            $table->string('notas')->nullable();
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
        Schema::dropIfExists('deudas');
    }
};
