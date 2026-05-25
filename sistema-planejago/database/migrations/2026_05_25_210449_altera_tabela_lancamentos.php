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
        Schema::table('lancamentos', function (Blueprint $table) {
            $table->dropForeign(['centro_custo_id']);
            $table->dropColumn('centro_custo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lancamentos', function (Blueprint $table) {
            $table->unsignedBigInteger('centro_custo_id')->nullable();
            $table->foreign('centro_custo_id')->references('id')->on('centro_custos')->onDelete('restrict');
        });
    }
};
