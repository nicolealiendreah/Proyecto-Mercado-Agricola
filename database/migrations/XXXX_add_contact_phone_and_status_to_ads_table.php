<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            // Teléfono de contacto (nullable)
            if (!Schema::hasColumn('ads', 'contact_phone')) {
                $table->string('contact_phone', 30)->nullable()->after('city');
            }

            // Estado: usamos string para Postgres (enum nativo requiere tipos)
            if (!Schema::hasColumn('ads', 'status')) {
                $table->string('status', 10)->default('activo')->after('contact_phone');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            if (Schema::hasColumn('ads', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('ads', 'contact_phone')) {
                $table->dropColumn('contact_phone');
            }
        });
    }
};
