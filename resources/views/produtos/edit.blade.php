@extends('layout')

@section('content')
    <h2>Editar Produto</h2>

    <form action="{{ route('produtos.update', $produto) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nome do Produto</label>
            <input type="text" name="nome_produto" class="form-control" value="{{ $produto->nome_produto }}" required>
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if($categoria->id == $produto->categoria_id) selected @endif>
                        {{ $categoria->nome_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Quantidade</label>
            <input type="number" name="quantidade" class="form-control" value="{{ $produto->quantidade }}" min="0" required>
        </div>

        <button class="btn btn-primary">Atualizar</button>
    </form>
@endsection
