@extends('layout')

@section('content')
    <h2>Categorias</h2>
    <a href="{{ route('categorias.create') }}" class="btn btn-success mb-2">Nova Categoria</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->nome_categoria }}</td>
            <td>
                <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
