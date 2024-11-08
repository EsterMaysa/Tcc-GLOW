@include('includes.headerFarmacia')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Movimentação</title>
    <!-- Adicione aqui seus links para CSS, se necessário -->
</head>
<body>
    <div class="container">
        <h1>Editar Movimentação</h1>
        <form action="{{ route('atualizarTipoMovimentacao', $movimentacao->idTipoMovimentacao) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="movimentacao">Movimentação</label>
                <input type="text" name="movimentacao" id="movimentacao" class="form-control" value="{{ old('movimentacao', $movimentacao->movimentacao) }}">
            </div>

            <div class="form-group">
                <label for="situacaoTipoMovimentacao">Situação</label>
                <input type="number" name="situacaoTipoMovimentacao" id="situacaoTipoMovimentacao" class="form-control" value="{{ old('situacaoTipoMovimentacao', $movimentacao->situacaoTipoMovimentacao) }}">
            </div>

            <div class="form-group">
                <label for="dataCadastroTipoMovimentacao">Data de Cadastro</label>
                <input type="date" name="dataCadastroTipoMovimentacao" id="dataCadastroTipoMovimentacao" class="form-control" value="{{ old('dataCadastroTipoMovimentacao', $movimentacao->dataCadastroTipoMovimentacao) }}">
            </div>

            <div class="form-group">
                <label for="idPrescricao">ID Prescrição</label>
                <input type="number" name="idPrescricao" id="idPrescricao" class="form-control" value="{{ old('idPrescricao', $movimentacao->idPrescricao) }}">
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>

@include('includes.footer')
