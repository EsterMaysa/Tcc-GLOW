<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Telefone</title>
</head>
<body>
    <h1>Adicionar um Novo Telefone</h1>
    
    <form action="{{ route('insertTelefone') }}" method="POST">
        @csrf <!-- Proteção contra CSRF -->
        
        <label for="numero">Número do Telefone:</label>
        <input type="text" name="telefone" id="telefone"><br><br>
        
        
        
        <label for="situacao">Situação:</label>
        <input type="text" name="situacao" id="situacao"><br><br>
        <br><br>
        
        <button type="submit">Cadastrar Telefone</button>
    </form>
</body>
</html>
