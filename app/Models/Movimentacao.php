<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movimentacao extends Model
{
    protected $table = 'movimentacoes';
    
    protected $fillable = ['tipo', 'produto_id', 'quantidade'];

    // Movimentação pertence a um produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    // Atualiza o estoque automaticamente ao criar uma movimentação
    protected static function booted()
    {
        static::created(function ($movimentacao) {
            DB::transaction(function () use ($movimentacao) {
                $produto = Produto::find($movimentacao->produto_id);

                if ($movimentacao->tipo === 'entrada') {
                    $produto->increment('quantidade', $movimentacao->quantidade);
                } elseif ($movimentacao->tipo === 'saida') {
                    // Evita estoque negativo
                    if ($produto->quantidade >= $movimentacao->quantidade) {
                        $produto->decrement('quantidade', $movimentacao->quantidade);
                    } else {
                        throw new \Exception("Quantidade insuficiente no estoque.");
                    }
                }
            });
        });
    }
}
