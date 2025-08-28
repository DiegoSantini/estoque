<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h1 class="mb-4">Controle de Estoque</h1>

    <nav class="mb-3">
        <a href="{{ route('categorias.index') }}" class="btn btn-primary">Categorias</a>
        <a href="{{ route('produtos.index') }}" class="btn btn-primary">Produtos</a>
        <a href="{{ route('movimentacoes.index') }}" class="btn btn-primary">Movimentações</a>
    </nav>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')

</body>
</html>
