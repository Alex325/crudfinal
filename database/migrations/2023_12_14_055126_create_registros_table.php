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
    Schema::create('registros', function (Blueprint $table) {
      $table->char('id', 36)->primary();
      $table->string('titulo', 50)->nullable(false);
      $table->text('texto')->nullable(false);
      $table->string('frase_do_dia', 100)->nullable(false);
      $table->char('cor', 7);
      $table->dateTime('data')->useCurrent()->nullable(false);
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
    Schema::dropIfExists('registros');
  }
};
