@extends('layout')

@section('content')
    <h2>Novo Produto</h2>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nome do Produto</label>
            <input type="text" name="nome_produto" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome_categoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Quantidade Inicial</label>
            <input type="number" name="quantidade" class="form-control" value="0" min="0" required>
        </div>

        <button class="btn btn-success">Salvar</button>
    </form>
@endsection
