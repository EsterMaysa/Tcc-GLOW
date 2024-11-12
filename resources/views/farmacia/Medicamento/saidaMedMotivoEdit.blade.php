<!--CSS OK (ASS:Duda)-->

@include('includes.headerFarmacia')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/MotivoCadastro.css')}}">


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
        <h1 style="font-weight: bold;">Editar Saída de Medicamentos</h1>
            <a href="{{ route('saidaMedMotivo.index') }}" class="submit" style="color: #fff; background-color: #265c4b; margin-top: 10px; text-align: center; display: block; text-decoration: none; width: 60%; border-radius: 30px; margin-left: 90px;">
                Voltar para Lista de Saídas e Motivos
            </a>
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
        <form action="{{ route('saidaMedMotivo.update', $saida->idSaidaMedicamento) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <!-- Data de Saída -->
                <div class="form-group">
                    <label for="dataSaida">Data de Saída:</label>
                    <div class="input-icon">
                        <i class="fas fa-calendar-alt"></i>
                        <input type="date" id="dataSaida" name="dataSaida" value="{{ $saida->dataSaida }}" required>
                    </div>
                </div>

                <!-- Quantidade -->
                <div class="form-group">
                    <label for="quantidade">Quantidade:</label>
                    <div class="input-icon">
                        <i class="fas fa-box"></i>
                        <input type="number" id="quantidade" class="form-control" name="quantidade" value="{{ $saida->quantidade }}" min="1" required>
                    </div>
                </div>

                <!-- Motivo de Saída -->
                <div class="form-group">
                    <label for="motivoSaida">Motivo de Saída:</label>
                    <div class="input-icon">
                        <i class="fas fa-info-circle"></i>
                        <input type="text" id="motivoSaida" name="motivoSaida" value="{{ $saida->motivoSaida }}" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <!-- Situação -->
                <div class="form-group">
                    <label for="situacao">Situação:</label>
                    <div class="input-icon">
                        <i class="fas fa-toggle-on"></i>
                        <select id="situacao" name="situacao" required>
                            <option value="1" {{ $saida->situacao == 1 ? 'selected' : '' }}>Ativo</option>
                            <option value="0" {{ $saida->situacao == 0 ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                </div>

                <!-- ID do Funcionário -->
                <div class="form-group">
                    <label for="idFuncionario">Funcionário Responsável:</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="number" id="idFuncionario" class="form-control" name="idFuncionario" value="{{ $saida->idFuncionario }}" required>
                    </div>
                </div>

                <!-- ID do Medicamento -->
                <div class="form-group">
                    <label for="idMedicamento">Medicamento:</label>
                    <div class="input-icon">
                        <i class="fas fa-pills"></i>
                        <input type="number" id="idMedicamento" class="form-control" name="idMedicamento" value="{{ $saida->idMedicamento }}" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <!-- Lote do Medicamento -->
                <div class="form-group">
                    <label for="lote">Lote:</label>
                    <div class="input-icon">
                        <i class="fas fa-barcode"></i>
                        <input type="text" id="lote" name="lote" value="{{ $saida->lote }}" required>
                    </div>
                </div>

                <!-- Validade do Medicamento -->
                <div class="form-group">
                    <label for="validade">Validade:</label>
                    <div class="input-icon">
                        <i class="fas fa-calendar-check"></i>
                        <input type="date" id="validade" name="validade" value="{{ $saida->validade }}" required>
                    </div>
                </div>

                <!-- Observações -->
                <div class="form-group">
                    <label for="observacao">Observação:</label>
                    <div class="input-icon">
                        <i class="fas fa-sticky-note"></i>
                        <input type="text" id="observacao" name="observacao" value="{{ $saida->observacao }}">
                    </div>
                </div>
            </div>

            <!-- Botão de Atualizar -->
            <button type="submit" class="submit-btn">Atualizar Saída</button>
        </form>
    </div>
</main>
