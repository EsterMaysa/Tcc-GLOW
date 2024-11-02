<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
</head>
<body>
    <h2>Cadastrar Funcionário</h2>
    <form action="{{ route('insertFuncionario') }}" method="POST">
        @csrf
        <div>
            <label>Nome:</label>
            <input type="text" name="nomeFuncionario" required>
        </div>
        <div>
            <label>CPF:</label>
            <input type="text" name="cpfFuncionario" required>
        </div>
        <div>
            <label>Cargo:</label>
            <input type="text" name="cargoFuncionario" required>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
