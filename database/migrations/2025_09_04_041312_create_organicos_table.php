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
        Schema::create('organicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('categoria');
            $table->decimal('precio', 10, 2)->default(0);
            $table->integer('stock')->default(0);
            $table->date('fecha_cosecha')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organicos');
    }
};
