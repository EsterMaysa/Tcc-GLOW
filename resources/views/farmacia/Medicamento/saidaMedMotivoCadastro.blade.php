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

        <input type="hidden" name="idMedicamento" id="idMedicamento">

        <div class="form-row">
            <div class="form-group">
                <label for="codigoBarras">
                    <i class="fas fa-barcode"></i> Código de Barras:
                </label>
                <input type="text" name="codigoBarras" id="codigoBarras" required>
                <small id="codigoBarrasError" style="color: red; display: none;">Medicamento não encontrado.</small>
            </div>
            <div class="form-group">
                <label for="nomeMedicamento">
                    <i class="fas fa-pills"></i> Medicamento:
                </label>
                <input type="text" id="nomeMedicamento" readonly>
            </div>
            <div class="form-group">
                <label for="dataSaida">
                    <i class="fas fa-calendar-alt"></i> Data de Saída:
                </label>
                <input type="date" name="dataSaida" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="quantidade">
                    <i class="fas fa-sort-numeric-up"></i> Quantidade:
                </label>
                <input type="number" name="quantidade" id="quantidade" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="lote">
                    <i class="fas fa-box"></i> Lote:
                </label>
                <input type="text" name="lote" id="lote" readonly>
            </div>
            <div class="form-group">
                <label for="validade">
                    <i class="fas fa-calendar-check"></i> Validade:
                </label>
                <input type="date" name="validade" id="validade" readonly>
            </div>
            <div class="form-group">
                <label for="motivoSaida">
                    <i class="fas fa-file-alt"></i> Motivo da Saída:
                </label>
                <input type="text" name="motivoSaida" id="motivoSaida" required placeholder="Digite o motivo da saída">
            </div>
            <div class="form-group">
                <label for="funcionario">
                    <i class="fas fa-user"></i> Funcionário Responsável:
                </label>
                <select name="idFuncionario" id="funcionario" required>
                    <option value="">Selecione um funcionário</option>
                    @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->idFuncionario }}">{{ $funcionario->nomeFuncionario }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="submit-btn">
            <i class="fas fa-save"></i> Registrar Saída
        </button>
    </form>
</div>

</main>
@include('includes.footer')

<script>
    // Alteração para buscar medicamento ao pressionar Enter no campo "Código de Barras"
    document.getElementById('codigoBarras').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {  // Verifica se a tecla pressionada foi Enter
            event.preventDefault(); // Impede o comportamento padrão (não envia o formulário)

            const codigoBarras = this.value.trim();

            if (!codigoBarras) {
                alert('Por favor, insira o código de barras.');
                return;
            }

            fetch(`/buscarPorCodigoBarras?codigoBarras=${codigoBarras}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Medicamento não encontrado');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('codigoBarrasError').style.display = 'none';
                    document.getElementById('nomeMedicamento').value = data.nomeMedicamento;
                    document.getElementById('lote').value = data.lote;
                    document.getElementById('validade').value = data.validade;
                    document.getElementById('idMedicamento').value = data.idMedicamento;
                })
                .catch(error => {
                    console.error('Erro ao buscar medicamento:', error);
                    document.getElementById('codigoBarrasError').style.display = 'block';
                });
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
