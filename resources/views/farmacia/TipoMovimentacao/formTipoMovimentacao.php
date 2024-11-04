<!-- resources/views/tipoMovimentacao/create.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Tipo de Movimentação</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Adicionei Bootstrap para estilização -->
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Cadastrar Tipo de Movimentação</h1>

        <!-- @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->

        <form action="{{ route('tipo-movimentacao.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="movimentacao">Movimentação:</label>
                <input type="text" name="movimentacao" id="movimentacao" class="form-control" required>
            </div>
            <!-- A parte de situação e data foi removida conforme solicitado -->
            <div class="form-group">
                <label for="idPrescricao">ID da Prescrição:</label>
                <input type="number" name="idPrescricao" id="idPrescricao" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
