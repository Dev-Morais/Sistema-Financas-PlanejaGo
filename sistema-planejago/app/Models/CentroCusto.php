<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentroCusto extends Model
{
    public function lancamentos(): hasMany
    {
        return $this->hasMany(Lancamento::class);
    }
}
