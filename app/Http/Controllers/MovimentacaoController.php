<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use App\Models\Produto;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function index()
    {
        $movimentacoes = Movimentacao::with('produto')->get();
        return view('movimentacoes.index', compact('movimentacoes'));
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('movimentacoes.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:entrada,saida',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        try {
            Movimentacao::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('movimentacoes.index')->with('error', $e->getMessage());
        }

        return redirect()->route('movimentacoes.index')->with('success', 'Movimentação registrada!');
    }
}
