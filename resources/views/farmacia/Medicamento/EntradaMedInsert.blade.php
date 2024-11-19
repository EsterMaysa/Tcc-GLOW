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
        <h1 style="font-weight: bold;">Cadastrar Entrada De Medicamentos</h1>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/saidaMed.png') }}" alt="Entrada De Medicamentos" class="img-fluid">
    </div>
</div>

<main>
<form action="/entradaMedicamento/store" method="POST" class="styled-form">
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
            <label for="dataEntrada">
                <i class="fas fa-calendar-alt"></i> Data de Entrada:
            </label>
            <input type="date" name="dataEntrada" value="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="quantidade">
                <i class="fas fa-sort-numeric-up"></i> Quantidade:
            </label>
            <input type="number" name="quantidade" required>
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
            <label for="motivoEntrada">
                <i class="fas fa-file-alt"></i> Motivo da Entrada:
            </label>
            <input type="text" name="motivoEntrada" id="motivoEntrada" required placeholder="Digite o motivo da entrada">
            <input type="hidden" name="idMotivoEntrada" id="idMotivoEntrada">
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
        <i class="fas fa-save"></i> Cadastrar
    </button>
</form>

</main>
<br>
@include('includes.footer')

<script>
    document.getElementById('codigoBarras').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {  // Detecta a tecla Enter
        event.preventDefault(); // Impede o comportamento padrão (não envia o formulário)

        const codigoBarras = this.value.trim();

        if (!codigoBarras) {
            alert('Por favor, insira o código de barras.');
            return;
        }

        fetch(`/buscarPorCodigoBarras?codigoBarras=${codigoBarras}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('codigoBarrasError').style.display = 'block';
                } else {
                    document.getElementById('codigoBarrasError').style.display = 'none';
                    document.getElementById('nomeMedicamento').value = data.nomeMedicamento;
                    document.getElementById('lote').value = data.lote;
                    document.getElementById('validade').value = data.validade;
                    document.getElementById('idMedicamento').value = data.idMedicamento;
                }
            })
            .catch(error => {
                console.error('Erro ao buscar medicamento:', error);
                document.getElementById('codigoBarrasError').style.display = 'block';
            });
    }
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
                body: JSON.stringify({
                    motivoEntrada: motivoEntrada
                })
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

    </script>    </script>
</script>