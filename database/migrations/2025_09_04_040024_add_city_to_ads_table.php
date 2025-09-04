<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->string('city', 100)->nullable()->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn('city');
        });
    }
};
