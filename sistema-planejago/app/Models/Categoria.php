<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'titulo',
    'descricao',
    'tipo_lancamento_id'
])]

class Categoria extends Model
{
    public function lancamento(): hasMany
    {
        return $this->hasMany(Lancamento::class);
    }

    public function tipoLancamento(): belongsTo
    {
        return $this->belongsTo(TipoLancamento::class);
    }

}
