<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil da UBS</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Perfil da UBS</h1>

        <!-- Exibe a mensagem de sucesso ou erro caso necessário -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Dados da UBS</h4>
            </div>
            <div class="card-body">
                <p><strong>CNPJ:</strong> {{ $ubs->cnpj }}</p>
                <p><strong>Nome:</strong> {{ $ubs->nome }}</p>
                <p><strong>Email:</strong> {{ $ubs->emailUBS }}</p>
                <p><strong>Endereço:</strong> {{ $ubs->endereco }}</p>
                <p><strong>Telefone:</strong> {{ $ubs->telefone }}</p>
                <p><strong>Status:</strong> {{ $ubs->status == 1 ? 'Ativo' : 'Inativo' }}</p>

                <!-- Botão para editar dados do perfil (se necessário) -->
                <a href="/editar-perfil" class="btn btn-warning">Editar Perfil</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
