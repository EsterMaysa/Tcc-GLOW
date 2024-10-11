<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar UBS</title>
</head>
<body>
    <h1>Adicionar uma nova UBS</h1>
    
    <form action="{{ route('insertUBS') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Proteção contra CSRF -->
        
        <label for="nome">Nome da UBS:</label>
        <input type="text" name="nome" id="nome" required><br><br>
        
        <label for="cnpj">CNPJ da UBS:</label>
        <input type="text" name="cnpj" id="cnpj" required><br><br>
        
        <label for="logradouro">Logradouro:</label>
        <input type="text" name="logradouro" id="logradouro" required><br><br>
        
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro" required><br><br>
        
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" required><br><br>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado" required><br><br>
        
        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" required><br><br>
        
        <label for="uf">UF:</label>
        <input type="text" name="uf" id="uf" required><br><br>
        
        <label for="cep">CEP:</label>
        <input type="text" name="cep" id="cep" required><br><br>
        
        <label for="complemento">Complemento:</label>
        <input type="text" name="complemento" id="complemento"><br><br>

        <!-- Campo para fotoUBS -->
        <label for="foto">Foto da UBS:</label>
        <input type="file" name="foto" id="foto"><br><br>
        
        <!-- Campo para latitudeUBS -->
        <label for="latitude">Latitude:</label>
        <input type="text" name="latitude" id="latitude"><br><br>
        
        <!-- Campo para longitudeUBS -->
        <label for="longitude">Longitude:</label>
        <input type="text" name="longitude" id="longitude"><br><br>

        <label for="situacao">Situação:</label>
        <input type="text" name="situacao" id="situacao"><br><br>
        
        <!-- Campo para senhaUBS -->
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>

        <!-- Campos para idTelefoneUBS e idRegiaoUBS -->
        <label for="telefone">ID do Telefone:</label>
        <input type="text" name="idTelefone" id="idTelefone"><br><br>
        
        <label for="regiao">ID da Região:</label>
        <input type="text" name="idRegiao" id="idRegiao"><br><br>
        
        <button type="submit">Cadastrar UBS</button>
    </form>
</body>
</html>
