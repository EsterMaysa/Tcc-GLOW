<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #f0f2f5;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            border: 1px solid #dee2e6;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
            width: 25%;
            display: flex;
            align-items: center;
        }

        label i {
            margin-right: 8px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: all 0.3s;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h2>Cadastrar Funcionário</h2>
    <form action="{{ route('insertFuncionario') }}" method="POST">
        @csrf
        <div class="form-group">
            <label><i class="fas fa-user"></i> Nome:</label>
            <input type="text" name="nomeFuncionario" required>
        </div>
        <div class="form-group">
            <label><i class="fas fa-id-card"></i> CPF:</label>
            <input type="text" name="cpfFuncionario" required>
        </div>
        <div class="form-group">
            <label><i class="fas fa-briefcase"></i> Cargo:</label>
            <input type="text" name="cargoFuncionario" required>
        </div>
        <button type="submit">Cadastrar</button>
    </form>

    <!-- Adicionando os ícones do Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
