@extends('layout')

@section('content')
    <h2>Produtos</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">

    <!-- Botão Novo Produto -->
    <a href="{{ route('produtos.create') }}" class="btn btn-success">Novo Produto</a>

    <!-- Formulário de Filtro -->
    <form method="GET" action="{{ route('produtos.index') }}" class="d-flex">
        <select name="categoria_id" class="form-control me-2">
            <option value="">-- Todas as Categorias --</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" 
                    @if(request('categoria_id') == $categoria->id) selected @endif>
                    {{ $categoria->nome_categoria }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

</div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
        @forelse($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome_produto }}</td>
            <td>{{ $produto->categoria->nome_categoria }}</td>
            <td>{{ $produto->quantidade }}</td>
            <td>
                <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Nenhum produto encontrado</td>
        </tr>
        @endforelse
    </table>
@endsection
