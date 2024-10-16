@include('includes.header') 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar UBS</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <script>
        function submitForm() {
            document.getElementById('ubsForm').submit();
        }
    </script>
    <style>
        /* Estilos específicos do formulário */
        .form-container {
            background-color: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            color: #333;
        }

        .form-container label {
            font-size: 16px;
            color: #555;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="file"],
        .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .form-container button:hover {
            background-color: #218838;
        }

        /* Garantindo que o campo de busca e a lupa do header mantenham o estilo padrão */
        .form-input {
            display: inline-flex;
            align-items: center;
        }

        .form-input input[type="search"] {
            border: 1px solid #ccc;
            padding: 6px;
            border-radius: 5px 0 0 5px;
            outline: none;
        }

        .form-input button {
            border: none;
            background: #fff;
            padding: 6px 10px;
            border-left: 1px solid #ccc;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .form-input button i {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Adicionar uma nova UBS</h1>
        <form id="ubsForm" action="{{ route('insertUBS') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Proteção contra CSRF -->
            
            <label for="nome">Nome da UBS:</label>
            <input type="text" name="ubs" id="ubs" required><br>

            <label for="cnpj">CNPJ da UBS:</label>
            <input type="text" name="cnpj" id="cnpj" required><br>

            <label for="logradouro">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro" required><br>

            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" id="bairro" required><br>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" required><br>

            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" required><br>

            <label for="numero">Número:</label>
            <input type="text" name="numero" id="numero" required><br>

            <label for="uf">UF:</label>
            <input type="text" name="uf" id="uf" required><br>

            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep" required><br>

            <label for="complemento">Complemento:</label>
            <input type="text" name="complemento" id="complemento"><br>

            <label for="foto">Foto da UBS:</label>
            <input type="file" name="foto" id="foto"><br>

            <label for="latitude">Latitude:</label>
            <input type="text" name="latitude" id="latitude"><br>

            <label for="longitude">Longitude:</label>
            <input type="text" name="longitude" id="longitude"><br>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required><br>

            <label for="regiao">Selecione a região:</label>
            <select id="idRegiao" name="idRegiao" required>
                <option value="">Selecione a região</option>
                @foreach($regioes as $r)
                    <option value="{{ $r->idRegiaoUBS }}">{{ $r->nomeRegiaoUBS }}</option>
                @endforeach           
            </select><br>

            <h2>Adicionar um Novo Telefone</h2>
            <label for="telefone">Número do Telefone:</label>
            <input type="text" name="telefone" id="telefone" required><br>

            <button type="button" onclick="submitForm()">Cadastrar UBS e Telefone</button>
        </form>
    </div>
</body>
</html>
