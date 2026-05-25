<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lancamento extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'descricao', 
        'valor', 
        'status_pago', 
        'data_criacao', 
        'data_vencimento', 
        'log_data_inclusao', 
        'log_data_alteracao', 
        'log_versao_registro',
        'categoria_id',
        'frequencia_id',
        'tipo_lancamento_id',
        'user_id'
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function tipoLancamento(): BelongsTo
    {
        return $this->belongsTo(TipoLancamento::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function frequencia(): BelongsTo
    {
        return $this->belongsTo(Frequencia::class);
    }   
}
