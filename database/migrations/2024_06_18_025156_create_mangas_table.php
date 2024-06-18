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
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_categoria');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('autor')->nullable();
            $table->string('genero')->nullable();
            $table->string('estatus')->default('ongoing'); //ongoing, completed, paused
            $table->timestamps();

            $table->foreign('fk_categoria')->references('id')->on('categoria')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mangas');
    }
};
