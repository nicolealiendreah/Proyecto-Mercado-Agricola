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
        Schema::create('maquinarias', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->string('marca');
                $table->string('modelo')->nullable();
                $table->decimal('precio_dia', 10, 2)->default(0);
                $table->text('descripcion')->nullable();

                $table->foreignId('tipo_maquinaria_id')
                ->constrained('tipo_maquinarias');

                $table->foreignId('estado_id')
                ->constrained('estado_productos');

                $table->timestamps();
            });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquinarias');
    }
};
