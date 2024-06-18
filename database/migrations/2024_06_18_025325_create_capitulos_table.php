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
        Schema::create('capitulos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_manga');
            $table->string('titulo');
            $table->integer('num_capitulo');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('fk_manga')->references('id')->on('mangas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capitulos');
    }
};
