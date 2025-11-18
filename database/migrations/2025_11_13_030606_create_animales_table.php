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
    Schema::create('animales', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->decimal('precio', 10, 2)->default(0);
        $table->integer('stock')->default(0);
        $table->date('fecha_nacimiento')->nullable();
        $table->text('descripcion')->nullable();

        $table->foreignId('especie_id')->constrained('especies');
        $table->foreignId('raza_id')->constrained('razas');
        $table->foreignId('unidad_id')->constrained('unidades');
        $table->foreignId('estado_id')->constrained('estado_productos');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales');
    }
};
