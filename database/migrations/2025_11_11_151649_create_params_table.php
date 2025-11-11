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
    Schema::create('params', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->id();
        $table->string('grupo');           
        $table->string('clave')->nullable();
        $table->string('nombre');     
        $table->foreignId('parent_id')->nullable()->constrained('params'); 
        $table->boolean('activo')->default(true);
        $table->timestamps();
        $table->index(['grupo','parent_id','activo']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('params');
    }
};
