@include('includes.headerFarmacia')
<!-- PAGINA PRINCIPAL DO ESTOQUE A HOME DO ESTOQUE -->


<!-- Main content -->
<div class="container d-flex justify-content-center">
    <div class="col-md-9 col-lg-10 main-content">
        <!-- Relatórios de Estoque -->
        <div class="card bg-light text-dark custom-card">
            <div class="card-header custom-title">
                Precisa Atualizar o Estoque?
            </div>
            <div class="card-body">
                <div class="btn-group-wrapper">
                    <!-- Novo Remédio -->
                    <div class="btn-group">
                        <span>Novo Remédio</span>
                        <button class="btn-custom btn-add" onclick="window.location.href='/editarMedicamentoEstoque'">
                            +
                        </button>
                    </div>

                    <!-- Retirada de Remédio -->
                    <div class="btn-group">
                        <span>Retirada Remédio</span>
                        <button class="btn-custom btn-remove" onclick="window.location.href='/atualizarMedicamentoEstoque'">
                            -
                        </button>
                    </div>

                    <!-- Remédio Não Tem Estoque -->
                    <div class="btn-group">
                        <span>Remédio Não tem Estoque?</span>
                        <button class="btn-custom btn-cancel">
                            ✖
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visão Geral do Estoque -->
        <h1 class="text-dark text-center mt-5">Atualizações no Estoque</h1>
        <div class="card mt-4 bg-light text-dark custom-card">
            <div class="card-header">
                Visão Geral do Estoque
            </div>

            <!-- Formulário para Guardar na Tabela -->
            <div class="card mt-4 bg-light text-dark custom-card">
                <div class="card-header">
                    Guardar Informações na Tabela de Estoque
                </div>

                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="nome-remedio">Nome do Remédio:</label>
                            <input type="text" class="form-control rounded-input large-input" id="nome-remedio" name="nome_remedio" placeholder="Digite o nome do remédio" required>
                        </div>

                        <div class="form-group">
                            <label for="quantidade">Quantidade:</label>
                            <input type="number" class="form-control rounded-input large-input" id="quantidade" name="quantidade" placeholder="Digite a quantidade" required>
                        </div>

                        <!-- Botões de Rádio para Tipo de Operação -->
                        <div class="form-group">
                            <label>Tipo de Operação:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo_operacao" id="entrada" value="entrada" required>
                                <label cxlass="form-check-label" for="entrada">Entrada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo_operacao" id="saida" value="saida" required>
                                <label class="form-check-label" for="saida">Saída</label>
                            </div>
                        </div>

                        <!-- Botão Salvar -->
                        <button type="button" class="btn btn-success mt-4 rounded-button large-button" onclick="window.location.href='/estoqueFarmacia'">Salvar</button>
                    </form>
                </div>
            </div>

            <!-- Tabela de Estoque -->
            <div class="card mt-4 bg-light text-dark custom-card">
                <div class="card-header">
                    Tabela de Estoque
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-light text-center custom-table">
                        <thead>
                            <tr>
                                <th>Nome do Remédio</th>
                                <th>Quantidade</th>
                                <th>Tipo de Operação</th>
                                <th>Data de Atualização</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>nomeMedicamento</td>
                                <td>quantidade</td>
                                <td>tipoOperacao</td>
                                <td>dataAtualizacao</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>

<!-- Estilos CSS adicionais -->
<style>
    body {
        background-color: #ffffff; /* Fundo branco */
        color: #343a40; /* Texto escuro */
    }

    .custom-title {
        font-size: 28px; /* Tamanho maior */
        font-weight: bold;
        color: #28a745; /* Verde */
        text-align: center;
        background-color: #f8f9fa; /* Fundo claro */
        padding: 20px;
        border-radius: 12px; /* Bordas arredondadas maiores */
        border: 3px solid #28a745; /* Verde suave */
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 25px;
    }

    .btn-group-wrapper {
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 25px; /* Espaço maior entre os botões */
    }

    .btn-group {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .btn-group span {
        margin-bottom: 10px; /* Mais espaço entre texto e botão */
        font-weight: bold;
        color: #343a40; /* Texto escuro */
        font-size: 18px; /* Aumentado */
    }

    .btn-custom {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px;
        border-radius: 50%;
        width: 60px; /* Maior */
        height: 60px; /* Maior */
        font-size: 28px; /* Aumentado */
        font-weight: bold;
        color: white;
        cursor: pointer;
        border: 3px solid #6c757d; /* Borda maior */
        background-color: transparent;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-add {
        background-color: #28a745; /* Verde */
    }

    .btn-add:hover {
        background-color: #90ee90; /* Verde claro */
        color: white;
    }

    .btn-remove {
        background-color: #ffc107; /* Amarelo */
    }

    .btn-remove:hover {
        background-color: #ffdd57; /* Amarelo claro */
        color: white;
    }

    .btn-cancel {
        background-color: #dc3545; /* Vermelho */
    }

    .btn-cancel:hover {
        background-color: #ff6f6f; /* Vermelho claro */
        color: white;
    }

    .custom-card {
        border-radius: 12px; /* Bordas arredondadas maiores */
        border: 3px solid #28a745; /* Verde suave maior */
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1); /* Sombra leve */
    }

    .table th, .table td {
        padding: 15px; /* Células maiores */
        font-size: 18px; /* Texto maior */
        font-weight: bold;
        color: #343a40; /* Texto escuro */
        border-radius: 10px;
    }

    .table thead {
        background-color: #f8f9fa; /* Fundo claro */
    }

    .custom-table {
        border-radius: 12px; /* Bordas arredondadas na tabela */
    }

    .rounded-input {
        border-radius: 10px; /* Inputs com bordas maiores */
        border: 3px solid #28a745; /* Borda verde suave maior */
        font-size: 18px; /* Texto maior nos inputs */
        padding: 12px; /* Aumentando espaço dentro dos inputs */
    }

    .large-input {
        width: 100%; /* Inputs ocupando toda a largura */
    }

    .rounded-button {
        border-radius: 10px; /* Botão com bordas maiores */
        padding: 15px 25px; /* Botão maior */
        font-size: 20px; /* Texto maior */
    }

    .form-check-input {
        margin-right: 10px; /* Espaço entre o círculo e o texto */
    }

    .container {
        margin-top: 50px;
    }
</style>
