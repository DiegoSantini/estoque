@extends('layout')

@section('content')
    <h2>Nova Categoria</h2>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nome da Categoria</label>
            <input type="text" name="nome_categoria" class="form-control" required>
        </div>
        <button class="btn btn-success">Salvar</button>
    </form>
@endsection
