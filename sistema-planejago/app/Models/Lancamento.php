<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['descricao', 'valor', 'data_criacao', 'data_vencimento', 'log_data_inclusao', 'log_data_alteracao', 'log_data_registro', ])]
class Lancamento extends Model
{
    public function user(): belongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function tipoLancamento(): belongsTo
    {
        return $this->belongsTo(TipoLancamento::class);
    }

    public function categoria(): belongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function centroCusto(): belongsTo
    {
        return $this->belongsTo(CentroCusto::class);
    }

    public function frequencia(): belongsTo
    {
        return $this->belongsTo(Frequencia::class);
    }   
}
