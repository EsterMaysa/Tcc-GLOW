<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Telefone</title>
</head>
<body>
    <h1>Adicionar uma Nova Região</h1>
    
    <form action="{{ route('insertRegiao') }}" method="POST">
        @csrf <!-- Proteção contra CSRF vini -->
        
        <label for="numero">Nome da Região:</label>
        <input type="text" name="regiao" id="regiao"><br><br>
        
        
        
        <label for="situacao">Situação:</label>
        <input type="text" name="situacao" id="situacao"><br><br>
        <br><br>
        
        <button type="submit">Cadastrar Telefone</button>
    </form>
</body>
</html>
