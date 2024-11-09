@include('includes.headerFarmacia')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Saída de Medicamento e Motivo</title>
    <style>
        /* Estilos */
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

        .form-group input[type="date"],
        .form-group input[type="number"],
        .form-group input[type="text"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
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
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Cadastro de Saída de Medicamento e Motivo</h2>

        @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('saidaMedMotivo.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="idMedicamento">Medicamento:</label>
                <select id="idMedicamento" name="idMedicamento" required>
                    <option value="">Selecione o Medicamento</option>
                    @foreach($medicamentos as $medicamento)
                    <option value="{{ $medicamento->idMedicamento }}" data-lote="{{ $medicamento->lote }}" data-validade="{{ $medicamento->validade }}">
                        {{ $medicamento->nomeMedicamento }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dataSaida">Data de Saída:</label>
                <input type="date" id="dataSaida" name="dataSaida" required>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" min="1" required>
            </div>

            <div class="form-group">
                <label for="motivoSaida">Motivo de Saída:</label>
                <input type="text" id="motivoSaida" name="motivoSaida" placeholder="Descreva o motivo" required>
            </div>

            <div class="form-group">
                <label for="lote">Lote:</label>
                <input type="text" id="lote" name="lote" maxlength="90" required>
            </div>

            <div class="form-group">
                <label for="validade">Data de Validade:</label>
                <input type="date" id="validade" name="validade" required>
            </div>

            <div class="form-group">
                <label for="idFuncionario">Funcionário:</label>
                <select id="idFuncionario" name="idFuncionario" required>
                    <option value="">Selecione o Funcionário</option>
                    @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->idFuncionario }}">{{ $funcionario->nomeFuncionario }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">Cadastrar Saída e Motivo</button>
        </form>
    </div>

    <div>
        <a href="/saidaLista" class="btn-submit" style="background-color: #2196F3; margin-top: 10px; text-align: center; display: block; width: 470px; padding: 8px 16px;">
            Ver Lista de Saídas e Motivos
        </a>
    </div>
    <script>
        // Função para atualizar lote e validade com base no medicamento selecionado
        document.getElementById('idMedicamento').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const lote = selectedOption.getAttribute('data-lote');
            const validade = selectedOption.getAttribute('data-validade');

            document.getElementById('lote').value = lote || '';
            document.getElementById('validade').value = validade || '';
        });
    </script>
</body>
</html>
