@include('includes.headerFarmacia')

<form action="{{ route('entradaMedUpdate', $entrada->idEntradaMedicamento) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="medicamento">Medicamento:</label>
        <select name="idMedicamento" class="form-control" id="medicamento" required>
            <option value="">Selecione um medicamento</option>
            @foreach($medicamentos as $medicamentoOption)
                <option value="{{ $medicamentoOption->idMedicamento }}" 
                        data-lote="{{ $medicamentoOption->loteMedicamento }}" 
                        data-validade="{{ $medicamentoOption->validadeMedicamento }}"
                        @if($medicamentoOption->idMedicamento == $entrada->idMedicamento) selected @endif>
                    {{ $medicamentoOption->nomeMedicamento }}
                </option>
            @endforeach
        </select>
        <small id="medicamentoError" style="color: red; display: none;">Medicamento não cadastrado.</small>
    </div>

    <div class="form-group">
        <label for="dataEntrada">Data de Entrada:</label>
        <input type="date" name="dataEntrada" class="form-control" value="{{ $entrada->dataEntrada }}" required>
    </div>

    <div class="form-group">
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" class="form-control" value="{{ $entrada->quantidade }}" required>
    </div>

    <div class="form-group">
        <label for="lote">Lote:</label>
        <input type="text" name="lote" class="form-control" value="{{ $entrada->lote }}" required readonly id="lote">
    </div>

    <div class="form-group">
        <label for="validade">Validade:</label>
        <input type="date" name="validade" class="form-control" value="{{ $entrada->validade }}" required readonly id="validade">
    </div>

    <input type="text" name="motivoEntrada" class="form-control" id="motivoEntrada" 
       value="{{ $motivoEntrada }}" required placeholder="Digite o motivo da entrada">





    <div class="form-group">
        <label for="funcionario">Funcionário Responsável:</label>
        <select name="idFuncionario" class="form-control" id="funcionario" required>
            <option value="">Selecione um funcionário</option>
            @foreach($funcionarios as $funcionario)
                <option value="{{ $funcionario->idFuncionario }}" @if($funcionario->idFuncionario == $entrada->idFuncionario) selected @endif>
                    {{ $funcionario->nomeFuncionario }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@include('includes.footer')

<script>
// Script para preencher automaticamente lote e validade ao selecionar o medicamento
document.getElementById('medicamento').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var lote = selectedOption.getAttribute('data-lote');
    var validade = selectedOption.getAttribute('data-validade');

    document.getElementById('lote').value = lote ? lote : '';
    document.getElementById('validade').value = validade ? validade : '';
});
</script>
