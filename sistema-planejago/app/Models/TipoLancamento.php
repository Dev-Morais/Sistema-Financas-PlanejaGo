<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoLancamento extends Model
{
    public function categorias(): hasMany 
    {
        return $this->hasMany(Categoria::class);
    }
    public function lancamentos(): hasMany 
    {
        return $this->hasMany(Lancamento::class);
    }
}
