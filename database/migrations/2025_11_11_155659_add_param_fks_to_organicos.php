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
    Schema::table('organicos', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->foreignId('categoria_id')->nullable()->constrained('params');
        $table->foreignId('variedad_id')->nullable()->constrained('params');
        $table->foreignId('unidad_id')->nullable()->constrained('params');
        $table->foreignId('estado_id')->nullable()->constrained('params');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organicos', function (Blueprint $table) {
            //
        });
    }
};
