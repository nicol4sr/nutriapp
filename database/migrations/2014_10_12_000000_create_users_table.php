<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('email_blocked_at')->nullable();
            $table->string('password');
            $table->string('foto')->default('');
            $table->boolean('genero');
            $table->dateTime('fecha_nacimiento');
            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidades')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('objetivo_id');
            $table->foreign('objetivo_id')->references('id')->on('tipos')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('habitos');
            $table->float('altura');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
