<!--CSS OK ASS: GABY-->

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
        <h1 style="font-weight: bold;"> Cadastrar Medicamento</h1>
        <p>Você pode gerenciar o medicamento nessa página.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/medi.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<main>
    <div class="container">
        <div class="form-container">

            <form action="/CadMedFarma" method="POST">
                @csrf
                <input type="hidden" name="idUBS" value="{{ $idUBS }}">

                <div class="form-row">

                    <div class="form-col">
                        <label for="codigoDeBarrasMedicamento">Código de Barras</label>
                        <input type="text" class="form-control" id="codigoDeBarrasMedicamento" name="codigoDeBarrasMedicamento" value="{{ old('codigoDeBarrasMedicamento') }}" required onblur="buscarMedicamento()">
                    </div>

                    <!-- Nome do Medicamento -->
                    <div class="form-col">
                        <label for="nomeMedicamento">Nome do Medicamento</label>
                        <input type="text" class="form-control" id="nomeMedicamento" name="nomeMedicamento" value="{{ old('nomeMedicamento') }}" required>
                    </div>

                    <!-- Nome Genérico do Medicamento -->
                    <div class="form-col">
                        <label for="nomeGenericoMedicamento">Nome Genérico do Medicamento</label>
                        <input type="text" class="form-control" id="nomeGenericoMedicamento" name="nomeGenericoMedicamento" value="{{ old('nomeGenericoMedicamento') }}" required>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="validadeMedicamento">Data de Validade</label>
                        <input type="date" class="form-control" id="validadeMedicamento" name="validadeMedicamento" required>
                    </div>

                    <!-- Lote do Medicamento -->
                    <div class="form-col">
                        <label for="loteMedicamento">Lote</label>
                        <input type="text" class="form-control" id="loteMedicamento" name="loteMedicamento" required>
                    </div>

                    <!-- Forma Farmacêutica do Medicamento -->
                    <div class="form-col">
                        <label for="formaMedicamento">Forma Farmacêutica</label>
                        <select class="form-control" id="formaMedicamento" name="forma" required>
                            <option value="">Selecione a Forma Farmacêutica</option>
                            <option value="Comprimido">Comprimido</option>
                            <option value="Cápsula">Cápsula</option>
                            <option value="Pomada">Pomada</option>
                            <option value="Solução">Solução</option>
                            <option value="Suspensão">Suspensão</option>
                            <option value="Creme">Creme</option>
                            <option value="Gel">Gel</option>
                            <option value="Injeção">Injeção</option>
                        </select>
                    </div>
                </div>
                <!-- Código de Barras do Medicamento -->

                <div class="form-row">

                    <!-- Dosagem do Medicamento -->
                    <div class="form-col">
                        <label for="dosagemMedicamento">Dosagem</label>
                        <input type="text" class="form-control" id="dosagemMedicamento" name="dosagemMedicamento" required>
                    </div>

                    <!-- Composição do Medicamento -->
                    <div class="form-col">
                        <label for="composicaoMedicamento">Composição</label>
                        <textarea class="form-control" id="composicaoMedicamento" name="composicaoMedicamento" required></textarea>
                    </div>
                    <div class="form-col" style="margin-top: 15px ;">
                        <button type="submit" class="salvar">        
                            <i class="fas fa-save"></i> Salvar Medicamento
                        </button>

                    </div>
                </div>
                <!-- Botão de Enviar -->
            </form>
        </div>
    </div>
</main>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function buscarMedicamento() {
        const codigoDeBarras = $('#codigoDeBarrasMedicamento').val();

        if (codigoDeBarras) {
            $.ajax({
                url: `/CodMed/${codigoDeBarras}`,
                type: 'GET',
                success: function(data) {
                    console.log(data); // Veja o que está sendo retornado

                    if (data) {
                        // Atualiza os inputs visíveis com os valores recebidos
                        $('#nomeMedicamento').val(data.nomeMedicamento);
                        $('#nomeGenericoMedicamento').val(data.nomeGenericoMedicamento);
                        $('#composicaoMedicamento').val(data.composicaoMedicamento);
                    } else {
                        alert('Código de barras não encontrado!');
                    }
                },
                error: function(jqXHR) {
                    alert('Erro ao buscar o medicamento!');
                    console.error(jqXHR.responseText); // Exibe detalhes do erro no console
                }
            });
        }
    }
</script>

@include('includes.footer')