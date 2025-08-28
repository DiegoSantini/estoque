@extends('layout')

@section('content')
    <h2>Movimentações</h2>
    <a href="{{ route('movimentacoes.create') }}" class="btn btn-success mb-2">Nova Movimentação</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Quantidade</th>
            <th>Data</th>
        </tr>
        @foreach($movimentacoes as $movimentacao)
        <tr>
            <td>{{ $movimentacao->id }}</td>
            <td>{{ $movimentacao->produto->nome_produto }}</td>
            <td>
                @if($movimentacao->tipo === 'entrada')
                    <span class="badge bg-success">Entrada</span>
                @else
                    <span class="badge bg-danger">Saída</span>
                @endif
            </td>
            <td>{{ $movimentacao->quantidade }}</td>
            <td>{{ $movimentacao->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        @endforeach
    </table>
@endsection
