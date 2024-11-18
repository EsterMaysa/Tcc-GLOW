<!--CSS OK(ASS:Duda)-->

@include('includes.headerFarmacia')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/CadastrarSaida.css')}}">

<div class="navbar">
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Pesquisar...">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</div>

<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;"> Cadastrar Saída De Medicamentos </h1>
        <a href="/saidaLista" class="lista">
            Ver Saídas de Medicamentos
        </a>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/saidaMed.png') }}" alt="Saída De Medicamentos" class="img-fluid">
    </div>
</div>


<main style="margin-top: 3%;">
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-wrapper">
    <form action="{{ route('saidaMedMotivo.store') }}" method="POST" class="styled-form">
        @csrf
        <!-- Tabela de Formulário -->
        <table class="form-table">
            <thead>
                <tr>
                    <th colspan="2">Cadastro de Saída e Motivo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label for="idMedicamento">Medicamento:</label></td>
                    <td>
                        <select id="idMedicamento" name="idMedicamento" required>
                            <option value="">Selecione o Medicamento</option>
                            @foreach($medicamentos as $medicamento)
                            <option value="{{ $medicamento->idMedicamento }}">
                                {{ $medicamento->nomeMedicamento }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="dataSaida">Data de Saída:</label></td>
                    <td><input type="date" id="dataSaida" name="dataSaida" required></td>
                </tr>

                <tr>
                    <td><label for="quantidade">Quantidade:</label></td>
                    <td><input type="number" id="quantidade" name="quantidade" min="1" required></td>
                </tr>

                <tr>
                    <td><label for="motivoSaida">Motivo de Saída:</label></td>
                    <td><input type="text" id="motivoSaida" name="motivoSaida" placeholder="Descreva o motivo" required></td>
                </tr>

                <tr>
                    <td><label for="lote">Lote:</label></td>
                    <td><input type="text" id="lote" name="lote" maxlength="90" required></td>
                </tr>

                <tr>
                    <td><label for="validade">Data de Validade:</label></td>
                    <td><input type="date" id="validade" name="validade" required></td>
                </tr>

                <tr>
                    <td><label for="idFuncionario">Funcionário:</label></td>
                    <td>
                        <select id="idFuncionario" name="idFuncionario" required>
                            <option value="">Selecione o Funcionário</option>
                            @foreach($funcionarios as $funcionario)
                            <option value="{{ $funcionario->idFuncionario }}">{{ $funcionario->nomeFuncionario }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="submit-btn">Cadastrar Saída e Motivo</button>
    </form>
</div>
<br>
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
