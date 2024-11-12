<!--CSS OK (ASS:Duda)-->

@include('includes.headerFarmacia')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/Entrada.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/3a.png') }}" alt="Logo" class="logo">
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input" style="border-radius: 18px;">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;"> Editar Entrada De Medicamentos </h1>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/cadFarmacia.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<main>
    <div class="form-wrapper">
        <form action="{{ route('entradaMedUpdate', $entrada->idEntradaMedicamento) }}" method="POST" class="styled-form">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group">
                    <label for="medicamento">
                        <i class="fas fa-pills"></i> Medicamento:
                    </label>
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
                    <label for="dataEntrada">
                        <i class="fas fa-calendar-alt"></i> Data de Entrada:
                    </label>
                    <input type="date" name="dataEntrada" class="form-control" value="{{ $entrada->dataEntrada }}" required>
                </div>

                <div class="form-group">
                    <label for="quantidade">
                        <i class="fas fa-sort-numeric-up"></i> Quantidade:
                    </label>
                    <input type="number" name="quantidade" class="form-control" value="{{ $entrada->quantidade }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="lote">
                        <i class="fas fa-cogs"></i> Lote:
                    </label>
                    <input type="text" name="lote" class="form-control" value="{{ $entrada->lote }}" required readonly id="lote">
                </div>

                <div class="form-group">
                    <label for="validade">
                        <i class="fas fa-calendar-check"></i> Validade:
                    </label>
                    <input type="date" name="validade" class="form-control" value="{{ $entrada->validade }}" required readonly id="validade">
                </div>

                <div class="form-group">
                    <label for="motivoEntrada">
                        <i class="fas fa-comment-alt"></i> Motivo da Entrada:
                    </label>
                    <input type="text" name="motivoEntrada" class="form-control" id="motivoEntrada" 
                    value="{{ $motivoEntrada }}" required placeholder="Digite o motivo da entrada">
                </div>

                <div class="form-group">
                    <label for="funcionario">
                        <i class="fas fa-user"></i> Funcionário Responsável:
                    </label>
                    <select name="idFuncionario" class="form-control" id="funcionario" required>
                        <option value="">Selecione um funcionário</option>
                        @foreach($funcionarios as $funcionario)
                            <option value="{{ $funcionario->idFuncionario }}" @if($funcionario->idFuncionario == $entrada->idFuncionario) selected @endif>
                                {{ $funcionario->nomeFuncionario }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="submit-btn">
                <i class="fas fa-save"></i> Atualizar
            </button>
        </form>
    </div>
</main>



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

