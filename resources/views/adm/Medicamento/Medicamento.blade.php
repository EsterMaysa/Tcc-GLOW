@include('includes.header') <!-- include -->

<!-- MAIN -->
<main>
    <!-- <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Cadastros</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Campo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Medicamento</p>
                        </td>
                        <td>
                            <a href="/medicamentoForm">
                                <span class="status busca">Cadastrar</span>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div> -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Medicamentos</h3>
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Pesquisar por nome, nome generico e codigo de barras..." class="search-input" style="width: 500px;">
                </div>
                <i class='bx bx-filter' data-bs-toggle="modal" data-bs-target="#filterModal"></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Código de Barras</th>
                        <th>Nome</th>
                        <th>Nome Genérico</th>
                        <th>Situação</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($medicamento as $med)
                    <tr>
                        <td style="padding: 10px;">{{ $med->codigoDeBarrasMedicamento }}</td>
                        <td>{{ $med->nomeMedicamento }}</td>
                        <td>{{ $med->nomeGenericoMedicamento }}</td>

                        <!-- <td>{{ $med->situacaoMedicamento }}</td> -->
                        <td>
                            @if( $med->situacaoMedicamento === 'A')
                                Ativado
                            @elseif( $med->situacaoMedicamento === 'D')
                                Desativado
                            @else
                                Indefinido
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($med->dataCadastroMedicamento)->format('d/m/Y') }}</td>
                        
                        @if ($med->situacaoMedicamento == 'A')
                        <td>
                            <a href="{{ route('medicamento.edit', $med->idMedicamento) }}" class="btn btn-warning">Editar</a>

                        </td>
                        <td>
                            <!-- Verifica se está ativo -->
                            <form action="{{ route('medicamento.desativar', $med->idMedicamento) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT') <!-- Usar PUT para desativar -->
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja desativar este medicamento?');">
                                    <i class="fas fa-ban"></i> Desativar
                                </button>
                            </form>
                        </td>
                        @endif
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetalhes{{ $med->idMedicamento }}">
                                Ver mais
                            </button>
                        </td>
                    </tr>

                    <!-- Modal para os detalhes do medicamento -->
                    <div class="modal fade" id="modalDetalhes{{ $med->idMedicamento }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalhes do Medicamento</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Código de Barras:</strong> {{ $med->codigoDeBarrasMedicamento }}</p>
                                    <p><strong>Nome:</strong> {{ $med->nomeMedicamento }}</p>
                                    <p><strong>Nome Genérico:</strong> {{ $med->nomeGenericoMedicamento }}</p>
                                    <p><strong>Registro ANVISA:</strong> {{ $med->registroAnvisaMedicamento }}</p>
                                    <p><strong>Forma Farmacêutica:</strong> {{ $med->formaFarmaceuticaMedicamento }}</p>
                                    <p><strong>Concentração:</strong> {{ $med->concentracaoMedicamento }}</p>
                                    <p><strong>Composição:</strong> {{ $med->composicaoMedicamento }}</p>
                                    <p><strong>Detentor:</strong> {{ $med->detentor->nomeDetentor ?? 'N/A' }}</p>
                                    <p><strong>Tipo Medicamento:</strong> {{ $med->tipoMedicamento->tipoMedicamento ?? 'N/A' }}</p>
                                    <p><strong>Situação:</strong> {{ $med->situacaoMedicamento }}</p>
                                    <p><strong>Data de Cadastro:</strong> {{ \Carbon\Carbon::parse($med->dataCadastroMedicamento)->format('d/m/Y') }}</p>

                                    <!-- Área da foto -->
                                    <div id="fotoMedicamento{{ $med->idMedicamento }}">
                                        @if($med->fotoMedicamentoOriginal)
                                        <p><strong>Foto Original:</strong></p>
                                        <img src="{{ asset('storage/' . $med->fotoMedicamentoOriginal) }}" alt="Foto Original" style="max-width: 100%;" id="imagemExibida{{ $med->idMedicamento }}">
                                        @else
                                        <p>Sem foto original.</p>
                                        @endif
                                    </div>

                                    <!-- Botão para alternar fotos -->
                                    <button type="button" class="btn btn-info" id="alternarFoto{{ $med->idMedicamento }}"
                                        data-foto-original="{{ asset('storage/' . $med->fotoMedicamentoOriginal) }}"
                                        data-foto-genero="{{ asset('storage/' . $med->fotoMedicamentoGenero) }}"
                                    >
                                        Ver Foto de Gênero
                                    </button>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                                    </div>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var tipoAtual = 'original';
                                    var botaoAlternar = document.getElementById('alternarFoto{{ $med->idMedicamento }}');

                                    // Verifica se o botão existe
                                    if (botaoAlternar) {
                                        botaoAlternar.addEventListener('click', function() {
                                            var imagem = document.getElementById('imagemExibida{{ $med->idMedicamento }}');

                                            // Verifica se a imagem existe
                                            if (imagem) {
                                                if (tipoAtual === 'original') {
                                                    imagem.src = botaoAlternar.getAttribute('data-foto-genero');
                                                    botaoAlternar.textContent = 'Ver Foto Original';
                                                    tipoAtual = 'genero';
                                                } else {
                                                    imagem.src = botaoAlternar.getAttribute('data-foto-original');
                                                    botaoAlternar.textContent = 'Ver Foto de Gênero';
                                                    tipoAtual = 'original';
                                                }
                                            }
                                        });
                                    }
                                });
                            </script>
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para filtros -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filtros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="filtroRegistroAnvisa" class="form-label">Registro ANVISA</label>
                        <select class="form-select" id="filtroRegistroAnvisa">
                            <option selected>Selecione o status do registro ANVISA</option>
                            <option value="deferido">Deferido</option>
                            <option value="indeferido">Indeferido</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="filtroFormaFarmaceutica" class="form-label">Forma Farmacêutica</label>
                        <select class="form-select" id="filtroFormaFarmaceutica">
                            <option selected>Selecione a forma farmacêutica</option>
                            <option value="comprimido">Comprimido</option>
                            <option value="capsula">Cápsula</option>
                            <option value="xarope">Xarope</option>
                            <option value="pomada">Pomada</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="filtroDetentor" class="form-label">Detentor</label>
                        <select class="form-select" id="filtroDetentor">
                            <option selected>Selecione o laboratório ou fabricante</option>
                            <option value="detentor1">Laboratório A</option>
                            <option value="detentor2">Laboratório B</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="filtroTipoMedicamento" class="form-label">Tipo de Medicamento</label>
                        <select class="form-select" id="filtroTipoMedicamento">
                            <option selected>Selecione o tipo de medicamento</option>
                            <option value="antibiotico">Antibiótico</option>
                            <option value="analgesico">Analgésico</option>
                            <option value="antiinflamatorio">Anti-inflamatório</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="filtroSituacao" class="form-label">Situação</label>
                        <select class="form-select" id="filtroSituacao">
                            <option selected>Selecione a situação</option>
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                            <option value="expirado">Registro Expirado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="filtroDataCadastro" class="form-label">Data de Cadastro</label>
                        <input type="date" class="form-control" id="filtroDataCadastro">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Aplicar Filtros</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</main>

@include('includes.footer') <!-- include -->

<!-- Link para o Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>