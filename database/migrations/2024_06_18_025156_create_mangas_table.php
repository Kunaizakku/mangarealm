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
            $table->text('descripcion');
            $table->string('autor');
            $table->string('genero');
            $table->string('estatus')->default('ongoing');
            $table->string('portada'); //ongoing, completed, paused
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
