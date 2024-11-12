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
        <h1 style="font-weight: bold;"> Cadastrar Entrada De Medicamentos </h1>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/cadFarmacia.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<main>
    <div class="form-wrapper">
        <form action="{{ route('entradaMedStore') }}" method="POST" class="styled-form">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="medicamento">
                        <i class="fas fa-pills"></i> Medicamento:
                    </label>
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
                    <label for="dataEntrada">
                        <i class="fas fa-calendar-alt"></i> Data de Entrada:
                    </label>
                    <input type="date" name="dataEntrada" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="quantidade" style="display: flex; align-items: center; font-size: 1rem; color: #333;">
                        <i class="fas fa-sort-numeric-up" style="margin-right: 8px; color: #265c4b;"></i> Quantidade:
                    </label>
                    <input type="number" name="quantidade" required
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; color: #333;">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="lote">
                        <i class="fas fa-box"></i> Lote:
                    </label>
                    <input type="text" name="lote"  required readonly id="lote">
                </div>
                <div class="form-group">
                    <label for="validade">
                        <i class="fas fa-calendar-check"></i> Validade:
                    </label>
                    <input type="date" name="validade"  required readonly id="validade">
                </div>
                <div class="form-group">
                    <label for="motivoEntrada">
                        <i class="fas fa-file-alt"></i> Motivo da Entrada:
                    </label>
                    <input type="text" name="motivoEntrada" id="motivoEntrada" required placeholder="Digite o motivo da entrada">
                    <input type="hidden" name="idMotivoEntrada" id="idMotivoEntrada">
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="funcionario" style="display: flex; align-items: center; font-size: 1.1rem; color: #333;">
                        <i class="fas fa-user" style="margin-right: 12px; font-size: 1.3rem; color: #265c4b;"></i> Funcionário Responsável:
                    </label>
                    <select name="idFuncionario" class="form-control" id="funcionario" required
                            style="width: 100%; padding: 12px; font-size: 1rem; border: 1px solid #ddd; border-radius: 6px; color: #333;">
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
