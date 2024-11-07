@include('includes.headerFarmacia')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Saída de Medicamento</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 100%;
        }
        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 15px;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edição de Saída de Medicamento</h2>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('saidaMedMotivo.update', $saida->idSaidaMedicamento) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Data de Saída -->
            <div class="form-group">
                <label for="dataSaida">Data de Saída:</label>
                <input type="date" id="dataSaida" name="dataSaida" value="{{ $saida->dataSaida }}" required>
            </div>

            <!-- Quantidade -->
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" value="{{ $saida->quantidade }}" min="1" required>
            </div>

            <!-- Motivo de Saída -->
            <div class="form-group">
                <label for="motivoSaida">Motivo de Saída:</label>
                <input type="text" id="motivoSaida" name="motivoSaida" value="{{ $saida->motivoSaida }}" required>
            </div>

            <!-- Situação -->
            <div class="form-group">
                <label for="situacao">Situação:</label>
                <select id="situacao" name="situacao" required>
                    <option value="1" {{ $saida->situacao == 1 ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ $saida->situacao == 0 ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>

            <!-- ID do Funcionário -->
            <div class="form-group">
                <label for="idFuncionario">Funcionário Responsável:</label>
                <input type="number" id="idFuncionario" name="idFuncionario" value="{{ $saida->idFuncionario }}" required>
            </div>

            <!-- ID do Medicamento -->
            <div class="form-group">
                <label for="idMedicamento">Medicamento:</label>
                <input type="number" id="idMedicamento" name="idMedicamento" value="{{ $saida->idMedicamento }}" required>
            </div>

            <!-- Lote do Medicamento -->
            <div class="form-group">
                <label for="lote">Lote:</label>
                <input type="text" id="lote" name="lote" value="{{ $saida->lote }}" required>
            </div>

            <!-- Validade do Medicamento -->
            <div class="form-group">
                <label for="validade">Validade:</label>
                <input type="date" id="validade" name="validade" value="{{ $saida->validade }}" required>
            </div>

            <!-- Observações -->
            <div class="form-group">
                <label for="observacao">Observação:</label>
                <input type="text" id="observacao" name="observacao" value="{{ $saida->observacao }}">
            </div>

            <!-- Botão de Atualizar -->
            <button type="submit" class="btn-submit">Atualizar Saída</button>

            <!-- Botão de Voltar -->
            <a href="{{ route('saidaMedMotivo.index') }}" class="btn-submit" style="background-color: #2196F3; margin-top: 10px; text-align: center; display: block;">
                Voltar para Lista de Saídas e Motivos
            </a>
        </form>
    </div>
</body>
</html>
