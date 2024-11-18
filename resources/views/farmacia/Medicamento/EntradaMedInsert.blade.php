<!--CSS OK (ASS:Duda)-->
@include('includes.headerFarmacia')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/Entrada.css')}}">

<div class="navbar">
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Pesquisar...">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</div>

<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;"> Cadastrar Entrada De Medicamentos </h1>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/saidaMed.png') }}" alt="Entrada De Medicamentos" class="img-fluid">
    </div>
</div>

<main>
<div class="form-wrapper">
    <form action="{{ route('entradaMedStore') }}" method="POST" class="styled-form">
        @csrf

        <!-- Tabela de Formulário -->
        <table class="form-table">
            <thead>
                <tr>
                    <th colspan="2">Cadastrar Entrada de Medicamento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label for="codigo">Código De Barras:</label></td>
                    <td><input type="text" name="codigobarras" id="codigodebarras" placeholder="00000000000000"></td>
                </tr>

                <tr>
                    <td><label for="medicamento">Medicamento:</label></td>
                    <td>
                        <select name="idMedicamento" id="medicamento" class="form-control" required>
                            <option value="">Selecione um medicamento</option>
                            @foreach($medicamentos as $medicamento)
                                <option value="{{ $medicamento->idMedicamento }}" 
                                        data-lote="{{ $medicamento->loteMedicamento }}" 
                                        data-validade="{{ $medicamento->validadeMedicamento }}">
                                    {{ $medicamento->nomeMedicamento }}
                                </option>
                            @endforeach
                        </select>
                        <small id="medicamentoError" style="color: red; display: none;">Medicamento não cadastrado.</small>
                    </td>
                </tr>

                <tr>
                    <td><label for="dataEntrada">Data de Entrada:</label></td>
                    <td><input type="date" name="dataEntrada" value="{{ date('Y-m-d') }}" required></td>
                </tr>

                <tr>
                    <td><label for="quantidade">Quantidade:</label></td>
                    <td><input type="number" name="quantidade" required></td>
                </tr>

                <tr>
                    <td><label for="lote">Lote:</label></td>
                    <td><input type="text" name="lote" required readonly id="lote"></td>
                </tr>

                <tr>
                    <td><label for="validade">Validade:</label></td>
                    <td><input type="date" name="validade" required readonly id="validade"></td>
                </tr>

                <tr>
                    <td><label for="motivoEntrada">Motivo da Entrada:</label></td>
                    <td><input type="text" name="motivoEntrada" id="motivoEntrada" required placeholder="Digite o motivo da entrada"></td>
                </tr>

                <tr>
                    <td><label for="funcionario">Funcionário Responsável:</label></td>
                    <td>
                        <select name="idFuncionario" id="funcionario" class="form-control" required>
                            <option value="">Selecione um funcionário</option>
                            @foreach($funcionarios as $funcionario)
                                <option value="{{ $funcionario->idFuncionario }}">{{ $funcionario->nomeFuncionario }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="submit-btn">Cadastrar</button>
    </form>
</div>
</main>
<br>
@include('includes.footer')
    <script>
        // Atualiza os campos de lote e validade quando o medicamento é selecionado
        document.getElementById('medicamento').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const lote = selectedOption.getAttribute('data-lote');
            const validade = selectedOption.getAttribute('data-validade');

            document.getElementById('lote').value = lote || '';
            document.getElementById('validade').value = validade || '';
        });

        // motivo entrada cadastra automático
        document.getElementById('motivoEntrada').addEventListener('blur', function() {
            const motivoEntrada = this.value;

            if (motivoEntrada) {
                fetch('/motivoEntrada/buscarOuCriar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ motivoEntrada: motivoEntrada })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.idMotivoEntrada) {
                        document.getElementById('idMotivoEntrada').value = data.idMotivoEntrada;
                    } else {
                        console.error('Erro ao criar motivo de entrada:', data);
                    }
                })
                .catch(error => console.error('Erro ao buscar/criar motivo de entrada:', error));
            }
        });
    </script>
