<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Lista todas as categorias
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // Mostra formulário de criação
    public function create()
    {
        return view('categorias.create');
    }

    // Salva uma nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'nome_categoria' => 'required|string|max:255',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Mostra formulário de edição
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Atualiza categoria
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome_categoria' => 'required|string|max:255',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada!');
    }

    // Exclui categoria
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluída!');
    }
}
