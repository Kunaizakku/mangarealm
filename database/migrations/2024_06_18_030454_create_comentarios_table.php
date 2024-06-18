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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_usuario');
            $table->unsignedBigInteger('fk_manga');
            $table->text('comentario');
            $table->timestamps();
            
            $table->foreign('fk_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('fk_manga')->references('id')->on('mangas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
