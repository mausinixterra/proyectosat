<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Procesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->date('fecha_actividad');
            $table->bigInteger('actividades_id')->unsigned();
            $table->string('descripcion', 255);
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('solicitante_id')->unsigned();
            $table->bigInteger('canal_atencion_id')->unsigned();
            $table->bigInteger('realizado_por_id')->unsigned();
            $table->bigInteger('tiempo_invertido_id')->unsigned();
            $table->string('evidencia', 255)->nullable();
            $table->string('valor_servicio', 10)->nullable();
            $table->string('costo_actividad', 10)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->string('estado_registro', 1)->default('A');

            $table->foreign('actividades_id')->references('id')->on('actividades')->onUpdate('cascade');
            $table->foreign('clientes_id')->references('id')->on('clientes')->onUpdate('cascade');
            $table->foreign('solicitantes_id')->references('id')->on('solicitantes')->onUpdate('cascade');
            $table->foreign('canal_atencion_id')->references('id')->on('canal_atencion')->onUpdate('cascade');
            $table->foreign('realizado_por_id')->references('id')->on('realizado_por')->onUpdate('cascade');
            $table->foreign('tiempo_invertido_id')->references('id')->on('tiempo_invertido')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
