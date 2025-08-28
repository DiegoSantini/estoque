<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome_categoria'];

    // Uma categoria tem muitos produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
