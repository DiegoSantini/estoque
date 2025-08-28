@extends('layout')

@section('content')
    <h2>Editar Categoria</h2>

    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nome da Categoria</label>
            <input type="text" name="nome_categoria" class="form-control" value="{{ $categoria->nome_categoria }}" required>
        </div>
        <button class="btn btn-primary">Atualizar</button>
    </form>
@endsection
