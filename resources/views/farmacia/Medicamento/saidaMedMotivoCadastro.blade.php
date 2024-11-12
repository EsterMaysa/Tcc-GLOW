<!--CSS OK(ASS:Duda)-->

@include('includes.headerFarmacia')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{('css/Farmacia-CSS/MotivoCadastro.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/3a.png') }}" alt="Logo" class="logo">
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input" style="border-radius: 30px;">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;"> Cadastro de Saídas de Medicamentos e Motivos </h1>
        <div>
            <a href="/saidaLista" class="saida">
                Ver Lista de Saídas e Motivos
            </a>
        </div>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/lista.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<main>
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-wrapper">
        <form action="{{ route('saidaMedMotivo.store') }}" method="POST" class="styled-form">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="idMedicamento">Medicamento:</label>
                    <select id="idMedicamento" name="idMedicamento" required>
                        <option value="">Selecione o Medicamento</option>
                        @foreach($medicamentos as $medicamento)
                        <option value="{{ $medicamento->idMedicamento }}">
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
                    <input type="number" id="quantidade" class="form-control" name="quantidade" min="1" required>
                </div>
            </div>

            <div class="form-row">
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
            </div>
            <button type="submit" class="submit-btn">Cadastrar Saída e Motivo</button>
        </form>
    </div>
</main>
@include('includes.footer')
    <script>
        // Quando o medicamento for alterado, faz uma requisição AJAX para obter lote e validade
        $('#idMedicamento').on('change', function() {
            var medicamentoId = $(this).val();

            if (medicamentoId) {
                $.ajax({
                    url: '/getMedicamentoDetails/' + medicamentoId,  // Rota que vai retornar os dados do medicamento
                    type: 'GET',
                    success: function(response) {
                        if (response) {
                            $('#lote').val(response.lote);  // Preenche o campo de Lote
                            $('#validade').val(response.validade);  // Preenche o campo de Validade
                        }
                    }
                });
            } else {
                $('#lote').val('');  // Limpa o campo de Lote
                $('#validade').val('');  // Limpa o campo de Validade
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
