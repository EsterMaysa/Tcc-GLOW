@include('includes.headerFarmacia')

<!-- PAGINA PRINCIPAL DO ESTOQUE A HOME DO ESTOQUE -->

<div class="container mt-4">


    <!-- Seção com botões e imagem -->
    <div class="d-flex align-items-center justify-content-between mb-4 p-3 border rounded shadow-sm bg-light">
        <div class="d-flex flex-column align-items-center me-4">
            <a href="/EntradaMedicamentoHome" class="btn btn-success btn-lg mb-2">
                <i class="bi bi-box-arrow-in-down me-2"></i>
                Entrada de Medicamento
            </a>
            <small class="text-muted">Registrar entrada</small>
        </div>

        <div class="d-flex flex-column align-items-center me-4">
            <a href="/saidaMed" class="btn btn-danger btn-lg mb-2">
                <i class="bi bi-box-arrow-up me-2"></i>
                Saída de Medicamento
            </a>
            <small class="text-muted">Registrar saida</small>
        </div>

        <div class="d-flex align-items-center">
            <img src="path/to/imagem.jpg" alt="Imagem de estoque" class="img-thumbnail rounded-circle" style="width: 60px; height: 60px;">
            <div class="ms-3">
                <h6 class="mb-0">Estoque Atual</h6>
                <p class="text-muted mb-0">Status: Médio</p>
            </div>
        </div>
    </div>

    <!-- Tabela e status do estoque -->
    <div class="row">
        <div class="col-lg-9 mb-4">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Medicamento</th>
                            <th>Funcionario</th>
                            <th>Movimentação</th>
                            <th>Quantidade</th>
                            <th>Data de Validade</th>
                            <th>Situação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    @foreach ($estoque as $e)
                    <tbody>
                        <tr>
                            <td>{{ $e->medicamento->nomeMedicamento }}</td>
                            <td>{{ $e->funcionario->nomeFuncionario }}</td>
                            <td>{{ $e->tipoMovimentacao->movimentacao }}</td>
                            <td>{{ $e->quantEstoque }}</td>
                            <td>{{ \Carbon\Carbon::parse($e->dataMovimentacao)->format('d/m/Y') }}</td>
                            <td>{{ $e->situacaoEstoque == 'A' ? 'Ativo' : 'Inativo' }}</td>
                            <td>
                                <!-- Botão Editar -->
                                @if ($e->situacaoEstoque == 'A')

                                <button class="btn btn-primary btn-sm edit-btn"
                                    data-id="{{ $e->idEstoque }}"
                                    data-id-medicamento="{{ $e->medicamento->idMedicamento }}"
                                    data-id-funcionario="{{ $e->funcionario->idFuncionario }}"
                                    data-id-tipo-movimentacao="{{ $e->tipoMovimentacao->idTipoMovimentacao }}"
                                    data-quant-estoque="{{ $e->quantEstoque }}"
                                    data-data-movimentacao="{{ $e->dataMovimentacao }}">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </button>

                                <!-- Botão Desativar -->
                                <form action="{{ route('desativar', $e->idEstoque) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja desativar este estoque?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">Desativar</button>
                                </form>
                                @else
                                <!-- Botão ativar -->

                                <form action="{{ route('estoque.ativar', $e->idEstoque) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja ativar este estoque?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-primary">Ativar</button>
                                </form>

                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Status do Estoque</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nível:</strong> Alto / Médio / Baixo</p>
                    <p><strong>Última atualização:</strong> 01/11/2024</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulário de Movimentação do Estoque -->
    <div class="card mt-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Registrar Movimentação no Estoque</h5>
        </div>
        <div class="card-body">
            <form id="estoqueForm" action="/CadEstoque" method="POST">
                @csrf
                <input type="hidden" id="estoqueId" name="estoqueId">

                <div class="row g-3">
                    <!-- Campo para selecionar Medicamento -->
                    <div class="form-group">
                        <label for="idMedicamento" class="form-label">Nome do Medicamento</label>
                        <select class="form-control" id="idMedicamento" name="idMedicamento" required>
                            <option value="">Medicamentos</option>
                            @foreach ($medicamento as $med)
                            <option value="{{ $med->idMedicamento }}">{{ $med->nomeMedicamento }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Campo para informar o Funcionário -->
                    <div class="form-group">
                        <label for="idFuncionario" class="form-label">Funcionário</label>
                        <select class="form-control" id="idFuncionario" name="idFuncionario" required>
                            <option value="">Funcionário</option>
                            @foreach ($funcionario as $f)
                            <option value="{{ $f->idFuncionario }}">{{ $f->nomeFuncionario }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tipo de Movimentação (Entrada ou Saída) -->
                    <div class="form-group">
                        <label for="idTipoMovimentacao" class="form-label">Tipo de Movimentação</label>
                        <select class="form-control" id="idTipoMovimentacao" name="idTipoMovimentacao" required>
                            <option value="">Movimentação</option>
                            @foreach ($tipoMovimentacao as $tp)
                            <option value="{{ $tp->idTipoMovimentacao }}">{{ $tp->movimentacao }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Quantidade no Estoque -->
                    <div class="form-group">
                        <label for="quantEstoque" class="form-label">Quantidade Movimentada</label>
                        <input type="number" class="form-control" id="quantEstoque" name="quantEstoque" required>
                    </div>

                    <!-- Data da Movimentação -->
                    <div class="form-group">
                        <label for="dataMovimentacao" class="form-label">Data da Movimentação</label>
                        <input type="date" class="form-control" id="dataMovimentacao" name="dataMovimentacao" required>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <!-- Botão de submissão -->
                        <button type="submit" class="btn btn-success" id="submitBtn">Registrar Estoque</button>

                        <!-- Grupo de botões para edição -->
                        <div id="editBtnGroup" style="display: none;">
                            <button type="submit" class="btn btn-warning">Fazer mudanças</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Quando o botão "Editar" é clicado
        $('.edit-btn').click(function() {
            const idEstoque = $(this).data('id');
            const idMedicamento = $(this).data('id-medicamento');
            const idFuncionario = $(this).data('id-funcionario');
            const idTipoMovimentacao = $(this).data('id-tipo-movimentacao');
            const quantEstoque = $(this).data('quant-estoque');
            const dataMovimentacao = $(this).data('data-movimentacao');

            // Preenche os campos do formulário com os dados do estoque
            $('#idMedicamento').val(idMedicamento);
            $('#idFuncionario').val(idFuncionario);
            $('#idTipoMovimentacao').val(idTipoMovimentacao);
            $('#quantEstoque').val(quantEstoque);
            $('#dataMovimentacao').val(dataMovimentacao);
            $('#estoqueId').val(idEstoque); // Armazena o ID do estoque

            // Atualiza a ação do formulário para edição
            $('#estoqueForm').attr('action', `/estoque/${idEstoque}`);

            // Esconde o botão de submissão
            $('#submitBtn').hide();
            $('#editBtnGroup').show();
        });
    });
</script>

@include('includes.footer')