<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
{
    // Buscar todas as categorias para montar o filtro
    $categorias = \App\Models\Categoria::all();

    // Monta a query base de produtos com a relação de categoria
    $query = Produto::with('categoria');

    // Se o usuário escolheu uma categoria, aplica o filtro
    if ($request->filled('categoria_id')) {
        $query->where('categoria_id', $request->categoria_id);
    }

    // Executa a consulta
    $produtos = $query->get();

    // Retorna para a view, passando também as categorias para popular o select
    return view('produtos.index', compact('produtos', 'categorias'));
}

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_produto' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'quantidade'   => 'required|integer|min:0',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome_produto' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'quantidade'   => 'required|integer|min:0',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
    }
}
