@include('includes.header')

<!-- Main content -->
<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title">
        <div class="left">
            <h1>Criar Medicamento</h1>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="/">Criar Medicamento</a></li>
            </ul>
        </div>
    </div>

    <!-- Mensagens de Sucesso e Erro -->
    <div class="messages">
        @if (session('success_messages'))
            @foreach (session('success_messages') as $message)
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endforeach
            {{ session()->forget('success_messages') }} <!-- Limpa as mensagens após exibi-las -->
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Contêiner para centralizar o formulário -->
    <div class="form-wrapper">
        <form action="{{ url('/editarMedicamentoEstoque') }}" method="POST" class="styled-form">
            @csrf <!-- Token de segurança do Laravel -->

            <!-- Agrupando campos em uma linha -->
            <div class="form-row">
                <div class="form-group">
                    <label for="codigoDeBarrasMedicamento">Código de Barras:</label>
                    <input type="text" id="codigoDeBarrasMedicamento" name="codigoDeBarrasMedicamento" maxlength="15" placeholder="Ex: 1234567890123">
                </div>

                <div class="form-group">
                    <label for="idTipoMedicamento">Tipo de Medicamento:</label>
                    <select id="idTipoMedicamento" name="idTipoMedicamento" required>
                        <option value="" disabled selected>Selecione o Tipo de Medicamento</option>
                        @foreach ($tipoMedicamento as $t)
                            <option value="{{ $t->idTipoMedicamento }}">{{ $t->tipoMedicamento }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nomeMedicamento">Nome do Medicamento:</label>
                    <input type="text" id="nomeMedicamento" name="nomeMedicamento" maxlength="30" required placeholder="Ex: Paracetamol">
                </div>

                <div class="form-group">
                    <label for="nomeGenericoMedicamento">Nome Genérico:</label>
                    <input type="text" id="nomeGenericoMedicamento" name="nomeGenericoMedicamento" maxlength="30" placeholder="Ex: Acetaminofeno">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="validadeMedicamento">Validade:</label>
                    <input type="date" id="validadeMedicamento" name="validadeMedicamento" required>
                </div>

                <div class="form-group">
                    <label for="loteMedicamento">Lote:</label>
                    <input type="text" id="loteMedicamento" name="loteMedicamento" maxlength="30" required placeholder="Ex: 12345ABC">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="fabricacaoMedicamento">Data de Fabricação:</label>
                    <input type="date" id="fabricacaoMedicamento" name="fabricacaoMedicamento" required>
                </div>

                <div class="form-group">
                    <label for="quantMedicamento">Quantidade:</label>
                    <input type="number" id="quantMedicamento" name="quantMedicamento" required min="1" placeholder="Ex: 50">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="dosagemMedicamento">Dosagem:</label>
                    <input type="text" id="dosagemMedicamento" name="dosagemMedicamento" maxlength="30" required placeholder="Ex: 500mg">
                </div>

                <div class="form-group">
                    <label for="idFabricante">Fabricantes:</label>
                    <div style="display: flex; align-items: center;">
                        <select id="idFabricante" name="idFabricante" style="flex: 1; margin-right: 10px;">
                            <option value="" disabled selected>Selecione um Fabricante</option>
                            @foreach ($fabricantes as $fabricante)
                                <option value="{{ $fabricante->idFabricante }}">{{ $fabricante->nomeFabricante }}</option>
                            @endforeach
                        </select>
                        <!-- Botão para cadastrar novo fabricante -->
                        <a href="/fabricante" class="btn btn-secondary">Novo Fabricante</a>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="formaFarmaceuticaMedicamento">Forma Farmacêutica:</label>
                    <select id="formaFarmaceuticaMedicamento" name="formaFarmaceuticaMedicamento">
                        <option value="" disabled selected>Selecione a Forma Farmacêutica</option>
                        <option value="comprimido">Comprimido</option>
                        <option value="capsula">Cápsula</option>
                        <option value="solucao">Solução</option>
                        <option value="suspensao">Suspensão</option>
                        <option value="pomada">Pomada</option>
                        <option value="creme">Creme</option>
                        <option value="gel">Gel</option>
                        <option value="spray">Spray</option>
                        <option value="injeção">Injeção</option>
                        <option value="suplemento">Suplemento</option>
                        <option value="xarope">Xarope</option>
                        <option value="sublingual">Sublingual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="composicaoMedicamento">Composição:</label>
                    <textarea id="composicaoMedicamento" name="composicaoMedicamento" maxlength="255" placeholder="Ex: Paracetamol, Excipientes..."></textarea>
                </div>
            </div>

            <!-- Botão de Submissão -->
            <div class="form-group button-wrapper">
                <button type="submit" class="submit-btn">Cadastrar Medicamento</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

@include('includes.footer')
<!-- Estilos CSS Atualizados -->
<style>
    .form-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1;
        margin-right: 10px;
    }

    .form-group:last-child {
        margin-right: 0;
    }

    .form-group select,
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    .messages {
        margin-bottom: 20px;
        text-align: center;
    }

    .alert {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        display: inline-block;
        width: 100%;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    .alert-success {
        background-color: #4CAF50;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .styled-form {
        background-color: #14213D; /* Cor do formulário alterada */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 80vh;
        margin-left: 160px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: white; /* Mantém o texto branco para contraste */
    }

    .submit-btn {
        padding: 9px 320px;
        background-color: #57b8ff; /* Tom suave de azul */
        border: none;
        border-radius: 5px;
        color: black;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-left: 250px;
    }

    .submit-btn:hover {
        background-color: #4b89f5; /* Tom mais escuro ao passar o mouse */
    }

    .button-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-secondary {
        background-color: #57b8ff; /* Botão suave de azul */
        padding: 9px 15px;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin: 0 auto;
    }

    .btn-secondary:hover {
        background-color: #4b89f5; /* Tom mais escuro ao passar o mouse */
    }
</style>
