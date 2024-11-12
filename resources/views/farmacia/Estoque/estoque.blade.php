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

        <div class="d-flex flex-column align-items-center me-4 ">
            <a href="/saidaMed" class="btn btn-danger btn-lg mb-2">
                <i class="bi bi-box-arrow-up me-2"></i>
                Saída de Medicamento
            </a>
            <small class="text-muted">Registrar saida</small>
        </div>

        <div class="d-flex flex-column align-items-center me-4">
            <a href="/MedicamentoHome" class="btn btn-primary btn-lg mb-2">
                <i class="bi bi-box-arrow-up me-2"></i>
                Medicamento Registrados
            </a>
            <small class="text-muted">vizualizar todos medicamentos cadastrados</small>
        </div>

    </div>

    <!-- Tabela e status do estoque -->
    <div class="row">
        <div class="col-lg-9 mb-4">
            <div class="table-responsive">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Relatorio do estoque</h5>
                    <input type="text" id="searchInputEstoque" class="form-control" placeholder="Pesquisar por Medicamento e Funcionário" style="margin-top: 10px;">

                </div>
                <table class="table table-bordered table-striped" id="estoqueTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Medicamento</th>
                            <th>Funcionario</th>
                            <th>Movimentação</th>
                            <th>Quantidade</th>
                            <th>Data de Validade</th>
                            <th>Situação</th>
                            <th>Detalhes</th>
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
                            <td>{{ $e->situacaoEstoque == 'A' ||  $e->situacaoEstoque == '1' ? 'Ativo' : 'Inativo'  }}</td>
                            <td>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEstoque{{ $e->idEstoque }}">
                                    i
                                </button>

                                <!-- Modal para os detalhes do medicamento -->
                                <div class="modal fade" id="modalEstoque{{ $e->idEstoque }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header  text-black">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalhes do Estoque</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Medicamento</strong> {{ $e->medicamento->nomeMedicamento }}</p>
                                                <p><strong>Quantidade:</strong>{{ $e->quantEstoque }}</p>
                                                <p><strong>Nome Funcionario:</strong> {{ $e->funcionario->nomeFuncionario }}</p>
                                                <p><strong>Entradas:</strong> {{ $e->tipoMovimentacao->movimentacao }}</p>
                                                <p><strong>Data do cadastro:</strong>{{ \Carbon\Carbon::parse($e->dataMovimentacao)->format('d/m/Y') }}</p>
                                                <p><strong>Situação</strong> {{ $e->situacaoEstoque == 'A'  ||  $e->situacaoEstoque == '1' ? 'Ativo' : 'Inativo' }}</p>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                <div class="card-body" style="max-height: 250px; overflow-y: scroll;">
                    <!-- Notificações de Movimentações -->
                    @if ($movimentacoes->isNotEmpty())
                    @foreach ($movimentacoes as $movimentacao)
                    <p style="color: {{ $movimentacao->tipo == 'entrada' ? 'green' : 'red' }};">

                        @if($movimentacao->tipo == 'entrada')
                        Entrada -
                        {{ $movimentacao->nomeMedicamento }} -
                        {{ $movimentacao->quantidade }} Unidades -
                        {{ \Carbon\Carbon::parse($movimentacao->dataEntrada)->format('d/m/Y') }}
                        @else
                        Saída -
                        {{ $movimentacao->nomeMedicamento }} -
                        {{ $movimentacao->quantidade }} Unidades -
                        {{ \Carbon\Carbon::parse($movimentacao->dataSaida)->format('d/m/Y') }}
                        @endif
                    </p>
                    @endforeach
                    @else
                    <p>Nenhuma movimentação registrada.</p>
                    @endif


                </div>


            </div>
        </div>


        <!-- Tabela de Medicamentos Registrados -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Medicamentos Registrados</h5>
                    <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar por Nome, Genérico, Código ou Lote" style="margin-top: 10px;">

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="medicamentoTable">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Nome Genérico</th>
                                <th>Código de Barras</th>
                                <th>Lote</th>
                                <th>Validade</th>
                                <th>Situação</th>
                                <th>Movimentação</th>
                                <th>inf</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicamento as $med)

                            @if ($med->situacaoMedicamento == 'A' || $med->situacaoMedicamento == '1')

                            <tr>
                                <td>{{ $med->nomeMedicamento }}</td>
                                <td>{{ $med->nomeGenericoMedicamento }}</td>
                                <td>{{ $med->codigoDeBarrasMedicamento }}</td>
                                <td>{{ $med->loteMedicamento }}</td>
                                <td>{{ \Carbon\Carbon::parse($med->validadeMedicamento)->format('d/m/Y') }}</td>
                                <td>{{ $med->situacaoMedicamento == 'A'|| $med->situacaoMedicamento == '1' ? 'Ativo' : 'Inativo' }}</td>
                                <td>
                                    <!-- Botão Registrar Entrada -->
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#entradaModal{{ $med->idMedicamento }}">
                                        ↑
                                    </button>
                                    <!-- Botão Registrar Saída -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#saidaModal{{ $med->idMedicamento }}">
                                        ↓
                                    </button>
                                </td>

                                <td>
                                    <!-- Botão dos detalhes-->

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetalhes{{ $med->idMedicamento }}">
                                        i
                                    </button>

                                </td>

                            </tr>


                            <!-- Modal para os detalhes do medicamento -->
                            <div class="modal fade" id="modalDetalhes{{ $med->idMedicamento }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header  text-black">
                                            <h5 class="modal-title" id="exampleModalLabel">Detalhes do Medicamento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Código de Barras:</strong> {{ $med->codigoDeBarrasMedicamento }}</p>
                                            <p><strong>Nome:</strong> {{ $med->nomeMedicamento }}</p>
                                            <p><strong>Nome Genérico:</strong> {{ $med->nomeGenericoMedicamento }}</p>
                                            <p><strong>Lote:</strong> {{ $med->loteMedicamento }}</p>
                                            <p><strong>Dosagem:</strong> {{ $med->dosagemMedicamento }}</p>
                                            <p><strong>Forma Farmacêutica:</strong> {{ $med->formaFarmaceuticaMedicamento }}</p>
                                            <p><strong>Composição:</strong> {{ $med->composicaoMedicamento }}</p>
                                            <p><strong>Validade:</strong> {{ \Carbon\Carbon::parse($med->validadeMedicamento)->format('d/m/Y') }}</p>
                                            <p><strong>Situação:</strong> {{ $med->situacaoMedicamento == 'A' || $med->situacaoMedicamento == '1' ? 'Ativo' : 'Inativo' }}</p>
                                            <p><strong>Data de Cadastro:</strong> {{ \Carbon\Carbon::parse($med->dataCadastroMedicamento)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($funcionario as $f)

                            <!-- Modal para Registrar Entrada -->
                            <div class="modal fade" id="entradaModal{{ $med->idMedicamento }}" tabindex="-1" aria-labelledby="entradaModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header  text-black">
                                            <h5 class="modal-title" id="entradaModalLabel">Registrar Entrada de Medicamento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/CadEstoque" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="medicamento">Medicamento:</label>
                                                    <select name="idMedicamento" class="form-control" id="medicamento" required>
                                                        <option value="{{ $med->idMedicamento }}"
                                                            data-lote="{{ $med->loteMedicamento }}"
                                                            data-validade="{{ $med->validadeMedicamento }}">
                                                            {{ $med->nomeMedicamento }}
                                                        </option>
                                                    </select>
                                                    <small id="medicamentoError" style="color: red; display: none;">Medicamento não cadastrado.</small>
                                                </div

                                                <div class="form-group">
                                                    <label for="quantidade">Quantidade:</label>
                                                    <input type="number" name="quantidade" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="motivoEntrada">Motivo da Entrada:</label>
                                                    <input type="text" name="motivoEntrada" class="form-control" id="motivoEntrada" required placeholder="Digite o motivo da entrada">
                                                    <input type="hidden" name="idMotivoEntrada" id="idMotivoEntrada">
                                                </div>

                                                <div class="form-group">
                                                    <label for="funcionario">Funcionário Responsável:</label>
                                                    <select name="idFuncionario" class="form-control" id="funcionario" required>
                                                        <option value="">Selecione um funcionário</option>
                                                        <option value="{{ $f->idFuncionario }}">{{ $f->nomeFuncionario }}</option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal para Registrar Saída -->
                            <div class="modal fade" id="saidaModal{{ $med->idMedicamento }}" tabindex="-1" aria-labelledby="saidaModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-black">
                                            <h5 class="modal-title" id="saidaModalLabel">Registrar Saída de Medicamento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/CadEstoqueSaida" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="idMedicamento">Medicamento:</label>
                                                    <select id="idMedicamento" name="idMedicamento" required>
                                                        <option value="{{ $med->idMedicamento }}" data-lote="{{ $med->lote }}" data-validade="{{ $med->validade }}">
                                                            {{ $med->nomeMedicamento }}
                                                        </option>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="quantidade">Quantidade:</label>
                                                    <input type="number" id="quantidade" name="quantidade" min="1" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="motivoSaida">Motivo de Saída:</label>
                                                    <input type="text" id="motivoSaida" name="motivoSaida" placeholder="Descreva o motivo" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="idFuncionario">Funcionário:</label>
                                                    <select id="idFuncionario" name="idFuncionario" required>
                                                        <option value="">Selecione o Funcionário</option>
                                                        <option value="{{ $f->idFuncionario }}">{{ $f->nomeFuncionario }}</option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn-submit">Cadastrar Saída e Motivo</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @endif

                            @endforeach

                </div>
            </div>
            </tbody>

            </table>

        </div>

    </div>
    <!-- Link para o jQuery e Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {

            // Atualiza os campos de lote e validade quando o medicamento é selecionado
            document.getElementById('medicamento').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];

                // Obtendo os atributos de lote e validade
                const lote = selectedOption.getAttribute('data-lote');
                const validade = selectedOption.getAttribute('data-validade');

                // Preenchendo os campos do formulário
                document.getElementById('lote').value = lote || '';
                document.getElementById('validade').value = validade || '';
            });
            // Motivo de entrada cadastra automático
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

            // Pesquisa para a tabela de estoque
            $('#searchInputEstoque').on('keyup', function() {
                var value = $(this).val().toLowerCase(); // Obter valor e converter para minúsculas
                $('#estoqueTable tbody tr').filter(function() {
                    // Mostrar ou ocultar a linha com base no valor pesquisado na tabela de estoque
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Pesquisa para a tabela de outra funcionalidade (ajuste o seletor da tabela de acordo com sua necessidade)
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase(); // Obter valor e converter para minúsculas
                $('#medicamentoTable tbody tr').filter(function() {
                    // Mostrar ou ocultar a linha com base no valor pesquisado na outra tabela
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Ação de edição do modal de estoque
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

                // Esconde o botão de submissão e mostra o grupo de botões de edição
                $('#submitBtn').hide();
                $('#editBtnGroup').show();
            });
        });
    </script>


    @include('includes.footer')