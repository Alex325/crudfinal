<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fotografias', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('titulo', 50)->nullable(false);
            $table->tinyText('referencia')->nullable(false);
            $table->string('legenda', 100)->nullable(false);
            $table->dateTime('data')->useCurrent()->nullable(false);
            $table->date('data_da_foto')->default(null);
            $table->char('id_usuario', 36)->nullable(false);
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotografias');
    }
};
