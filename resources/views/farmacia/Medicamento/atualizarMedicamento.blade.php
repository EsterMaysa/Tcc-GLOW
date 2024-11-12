<!--css ok Gaby-->

@include('includes.headerFarmacia')<!-- include do header -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/CadMedicamento.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/3a.png') }}" alt="Logo" class="logo">
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>
<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;">Editar Medicamento</h1>
        <p>Você pode Editar o Medicamento nessa página.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/medi.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>


<main>
    <div class="container">
        <div class="form-container">
            <form action="{{ route('medicamentosFarma.update', $medicamento->idMedicamento) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-col">
                        <label for="nomeMedicamento">Nome Medicamento</label>
                        <input type="text" class="form-control" name="nomeMedicamento" value="{{ $medicamento->nomeMedicamento }}" required>
                    </div>

                    <div class="form-col">
                        <label for="nomeGenericoMedicamento">Nome Genérico</label>
                        <input type="text" class="form-control" name="nomeGenericoMedicamento" value="{{ $medicamento->nomeGenericoMedicamento }}" required>
                    </div>

                    <div class="form-col">
                        <label for="codigoDeBarrasMedicamento">Código de Barras</label>
                        <input type="text" class="form-control" name="codigoDeBarrasMedicamento" value="{{ $medicamento->codigoDeBarrasMedicamento }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="validadeMedicamento">Validade</label>
                        <input type="date" class="form-control" name="validadeMedicamento" value="{{ $medicamento->validadeMedicamento }}" required>
                    </div>

                    <div class="form-col">
                        <label for="loteMedicamento">Lote</label>
                        <input type="text" class="form-control" name="loteMedicamento" value="{{ $medicamento->loteMedicamento }}" required>
                    </div>

                    <div class="form-col">
                        <label for="dosagemMedicamento">Dosagem</label>
                        <input type="text" class="form-control" name="dosagemMedicamento" value="{{ $medicamento->dosagemMedicamento }}" required>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-col">
                        <label for="formaFarmaceuticaMedicamento">Forma Farmacêutica</label>
                        <input type="text" class="form-control" name="formaFarmaceuticaMedicamento" value="{{ $medicamento->formaFarmaceuticaMedicamento }}" required>
                    </div>

                    <div class="form-col">
                        <label for="composicaoMedicamento">Composição</label>
                        <textarea class="form-control" name="composicaoMedicamento" required>{{ $medicamento->composicaoMedicamento }}</textarea>
                    </div>

                    <div class="form-col">
                        <label for="situacaoMedicamento">Situação</label>
                        <select name="situacaoMedicamento" class="form-control" required>
                            <option value="A" {{ $medicamento->situacaoMedicamento == 'A' ? 'selected' : '' }}>Ativo</option>
                            <option value="I" {{ $medicamento->situacaoMedicamento == 'I' ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" style="margin-left: 100px;">
                    <div class="form-col" style="margin-left: 30%;">
                        <button type="submit" class="btn btn-success">Salvar</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</main>



@include('includes.footer')