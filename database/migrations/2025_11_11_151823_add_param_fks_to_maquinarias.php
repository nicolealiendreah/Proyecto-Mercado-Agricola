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
    Schema::table('maquinarias', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->foreignId('tipo_id')->nullable()->constrained('params');
        $table->foreignId('marca_id')->nullable()->constrained('params');
        $table->foreignId('modelo_id')->nullable()->constrained('params');
        $table->foreignId('estado_id')->nullable()->constrained('params');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('maquinarias', function (Blueprint $table) {
            //
        });
    }
};
