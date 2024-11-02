@include('includes.headerFarmacia')

<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title">
        <div class="left">
            <h1>Entrada de Medicamentos</h1>
        </div>
    </div>

    <div class="container">
        <h2>Cadastrar Entrada de Medicamento</h2>
        <form action="{{ route('entradaMedStore') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="medicamento">Medicamento:</label>
                <select name="idMedicamento" class="form-control" id="medicamento" required>
                    <option value="">Selecione um medicamento</option>
                    @foreach($medicamentos as $medicamento)
                        <option value="{{ $medicamento->idMedicamento }}" data-lote="{{ $medicamento->loteMedicamento }}" data-validade="{{ $medicamento->validadeMedicamento }}">
                            {{ $medicamento->nomeMedicamento }}
                        </option>
                    @endforeach
                </select>
                <small id="medicamentoError" style="color: red; display: none;">Medicamento não cadastrado.</small>
            </div>

            <div class="form-group">
                <label for="dataEntrada">Data de Entrada:</label>
                <input type="date" name="dataEntrada" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lote">Lote:</label>
                <input type="text" name="lote" class="form-control" required readonly id="lote">
            </div>

            <div class="form-group">
                <label for="validade">Validade:</label>
                <input type="date" name="validade" class="form-control" required readonly id="validade">
            </div>

            <div class="form-group">
                <label for="motivoEntrada">Motivo da Entrada:</label>
                <input type="text" name="motivoEntrada" class="form-control" id="motivoEntrada" required placeholder="Digite o motivo da entrada">
                <input type="hidden" name="idMotivoEntrada" id="idMotivoEntrada">
            </div>

            <div class="form-group">
                <label for="funcionario">Funcionário Responsável:</label>
                <select name="idFuncionario" class="form-control" id="funcionario" required>
                    <option value="">Selecione um funcionário</option>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{ $funcionario->idFuncionario }}">{{ $funcionario->nomeFuncionario }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>

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

<style>
    .table {
        margin: 20px 0;
        width: 100%;
        background-color: #14213D;
        color: #fff;
    }

    .table thead {
        background-color: #57b8ff;
    }

    .table tbody tr:hover {
        background-color: #4b89f5;
    }
</style>
