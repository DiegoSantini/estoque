@extends('layout')

@section('content')
    <h2>Nova Movimentação</h2>

    <form action="{{ route('movimentacoes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Produto</label>
            <select name="produto_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome_produto }} (Estoque: {{ $produto->quantidade }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tipo</label>
            <select name="tipo" class="form-control" required>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Quantidade</label>
            <input type="number" name="quantidade" class="form-control" min="1" required>
        </div>

        <button class="btn btn-success">Registrar</button>
    </form>
@endsection
