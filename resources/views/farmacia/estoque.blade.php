@include('includes.headerFarmacia')

<!-- Main content -->
<div class="col-md-9 col-lg-10 main-content">
    <!-- Relatórios de Estoque -->
    <div class="card bg-dark text-light">
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
                    <button class="btn-custom btn-remove">
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
    <h1 class="text-light">Atualizações no Estoque</h1>
    <div class="card mt-4 bg-dark text-light">
        <div class="card-header">
            Visão Geral do Estoque
        </div>

        <!-- Formulário para Guardar na Tabela -->
        <div class="card mt-4 bg-dark text-light">
            <div class="card-header">
                Guardar Informações na Tabela de Estoque
            </div>

            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="nome-remedio">Nome do Remédio:</label>
                        <input type="text" class="form-control" id="nome-remedio" name="nome_remedio" placeholder="Digite o nome do remédio" required>
                    </div>

                    <div class="form-group">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Digite a quantidade" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo de Operação:</label>
                        <select class="form-control" id="tipo" name="tipo_operacao" required>
                            <option value="entrada">Entrada</option>
                            <option value="saida">Saída</option>
                        </select>
                    </div>

                    <!-- Novo botão Cancelar -->
                    <button type="button" class="btn btn-success mt-3" onclick="window.location.href='/estoqueFarmacia'">Salvar</button>
                </form>
            </div>
        </div>

        <!-- Tabela de Estoque -->
        <div class="card mt-4 bg-dark text-light">
            <div class="card-header">
                Tabela de Estoque
            </div>

            <div class="card-body">
                <table class="table table-bordered table-dark">
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
                                <td>nomeMedicamento </td> 
                               
                            </tr>
                    </tbody>
                </table>
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
        background-color: #343a40; /* Fundo escuro */
        color: #f8f9fa; /* Texto claro */
    }

    .custom-title {
        font-size: 24px;
        font-weight: bold;
        color: #28a745; /* Verde */
        text-align: center;
        background-color: #495057; /* Cinza escuro */
        padding: 15px;
        border-radius: 8px;
        border: 2px solid #6c757d; /* Cinza */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        margin-bottom: 20px;
    }

    .btn-group-wrapper {
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 20px;
    }

    .btn-group {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .btn-group span {
        margin-bottom: 5px;
        font-weight: bold;
        color: #f8f9fa; /* Texto claro */
    }

    .btn-custom {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 24px;
        font-weight: bold;
        color: white;
        cursor: pointer;
        border: 2px solid #6c757d; /* Cinza */
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

    table {
        width: 100%;
        text-align: center;
    }

    table th, table td {
        padding: 10px;
        font-weight: bold;
        color: white; /* Texto branco */
    }

    table thead {
        background-color: #495057; /* Cinza escuro */
        color: white; /* Texto branco */
    }

    .btn-danger {
        background-color: #dc3545; /* Vermelho */
        color: white; /* Texto branco */
    }

    .btn-danger:hover {
        background-color: #c82333; /* Vermelho escuro */
    }
</style>
