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
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->id();            
            $table->string('descricao');
            $table->decimal('valor',12 , 2);
            $table->boolean('status_pago');
            $table->date('data_criacao');
            $table->date('data_vencimento');
            $table->datetime('log_data_inclusao');
            $table->datetime('log_data_alteracao');
            $table->integer('log_versao_registro');

            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('restrict');
            
            $table->unsignedBigInteger('frequencia_id');
            $table->foreign('frequencia_id')->references('id')->on('frequencias')->onDelete('restrict');

            $table->unsignedBigInteger('tipo_lancamento_id');
            $table->foreign('tipo_lancamento_id')->references('id')->on('tipo_lancamentos')->onDelete('restrict');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('centro_custo_id');
            $table->foreign('centro_custo_id')->references('id')->on('centro_custos')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lancamentos');
    }
};
