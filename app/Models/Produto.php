<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome_produto', 'categoria_id', 'quantidade'];

    // Produto pertence a uma categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Produto tem várias movimentações
    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }
}
