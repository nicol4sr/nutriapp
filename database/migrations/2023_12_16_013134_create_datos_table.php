<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('objetivo');
            $table->string('habitos');
            $table->string('genero');
            $table->string('pesoi');
            $table->string('pesoa');
            $table->string('altura');
            $table->string('imc');
            $table->string('discapacidad');
            $table->string('alergia');
            $table->unsignedBigInteger('nacionalidad');
            $table->foreign('nacionalidad')->references('id')->on('nacionalidades')->onUpdate('cascade')->onDelete('cascade');
            $table->string('edad');
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
        Schema::dropIfExists('datos');
    }
}
