<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['titulo', 'descricao'])]
class Frequencia extends Model
{
    public function lancamento(): hasMany 
    {
        return $this->hasMany(Lancamento::class);
    }
}
