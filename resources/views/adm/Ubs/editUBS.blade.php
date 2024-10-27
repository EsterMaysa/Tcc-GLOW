@include('includes.header') <!-- include -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar UBS</title>
    <!-- Adicionando Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2 {
            margin-bottom: 30px;
            color: #343a40;
        }
        label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Atualizar UBS</h2>
    <form action="{{ route('ubs.update', $ubs->idUBS) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomeUBS">Nome UBS:</label>
            <input type="text" class="form-control" name="nomeUBS" value="{{ $ubs->nomeUBS }}" required>
        </div>

        <div class="form-group">
            <label for="cnpjUBS">CNPJ:</label>
            <input type="text" class="form-control" name="cnpjUBS" value="{{ $ubs->cnpjUBS }}" required>
        </div>

        <div class="form-group">
            <label for="logradouroUBS">Logradouro:</label>
            <input type="text" class="form-control" name="logradouroUBS" value="{{ $ubs->logradouroUBS }}" required>
        </div>

        <div class="form-group">
            <label for="bairroUBS">Bairro:</label>
            <input type="text" class="form-control" name="bairroUBS" value="{{ $ubs->bairroUBS }}" required>
        </div>

        <div class="form-group">
            <label for="cidadeUBS">Cidade:</label>
            <input type="text" class="form-control" name="cidadeUBS" value="{{ $ubs->cidadeUBS }}" required>
        </div>

        <div class="form-group">
            <label for="numeroUBS">Número:</label>
            <input type="text" class="form-control" name="numeroUBS" value="{{ $ubs->numeroUBS }}" required>
        </div>

        <div class="form-group">
            <label for="ufUBS">UF:</label>
            <input type="text" class="form-control" name="ufUBS" value="{{ $ubs->ufUBS }}" required>
        </div>

        <div class="form-group">
            <label for="cepUBS">CEP:</label>
            <input type="text" class="form-control" name="cepUBS" value="{{ $ubs->cepUBS }}" required>
        </div>

        <div class="form-group">
            <label for="complementoUBS">Complemento:</label>
            <input type="text" class="form-control" name="complementoUBS" value="{{ $ubs->complementoUBS }}">
        </div>

        <div class="form-group">
            <label for="situacaoUBS">Situação:</label>
            <input type="text" class="form-control" name="situacaoUBS" value="{{ $ubs->situacaoUBS }}" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $telefone->numeroTelefoneUBS }}" required>
        </div>

        <button type="submit" class="btn btn-custom">Atualizar</button>
    </form>
</div>

</body>
</html>
