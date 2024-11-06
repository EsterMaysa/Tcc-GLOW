@include('includes.headerFarmacia')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Saídas e Motivos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .action-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .action-icons i {
            cursor: pointer;
            font-size: 18px;
            color: #555;
        }

        .action-icons i:hover {
            color: #4CAF50;
        }

        .filter-container {
            text-align: center;
            margin: 20px auto;
        }

        .filter-container input[type="text"],
        .filter-container input[type="date"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            margin-right: 10px;
        }

        .filter-container button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .filter-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lista de Saídas de Medicamentos e Motivos</h2>

    <div class="filter-container">
        <form action="{{ route('saidaMedMotivo.index') }}" method="GET">
            <input type="date" name="dataSaida" placeholder="Filtrar por Data" value="{{ request()->get('dataSaida') }}">
            <input type="text" name="motivoSaida" placeholder="Filtrar por Motivo" value="{{ request()->get('motivoSaida') }}">
            <button type="submit"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Data de Saída</th>
                <th>Quantidade</th>
                <th>Motivo de Saída</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($saidas as $saida)
            <tr>
                <td>{{ $saida->dataSaida }}</td>
                <td>{{ $saida->quantidade }}</td>
                <td>{{ $saida->motivoSaida }}</td>
                <td class="action-icons">
                    <!-- Botão de edição -->
                    <i class="fas fa-edit" title="Editar" onclick="window.location.href='{{ route('saidaMedMotivo.edit', $saida->idSaidaMedicamento) }}'"></i>
                    
                    <!-- Botão de exclusão -->
                    <i class="fas fa-trash-alt" title="Excluir" onclick="if(confirm('Tem certeza que deseja excluir?')) { event.preventDefault(); document.getElementById('delete-form-{{ $saida->idSaidaMedicamento }}').submit(); }"></i>
                    
                    <!-- Formulário de exclusão -->
                    <form id="delete-form-{{ $saida->idSaidaMedicamento }}" action="{{ route('saidaMedMotivo.destroy', $saida->idSaidaMedicamento) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
