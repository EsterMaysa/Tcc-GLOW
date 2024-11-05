@include('includes.header') <!-- include -->
<link rel="stylesheet" href="{{ asset('css/Medicamento.css') }}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/2a.png') }}" alt="Logo" class="logo"> 
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1>Medicamentos</h1>
        <p>Crie e consulte medicamentos.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/medicamento.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<div class="cadastros-container">
    <h3><i class='bx bx-plus-circle' style="margin-right: 6px;"></i> Cadastrar</h3>
    <div class="cadastros-list">
        <div class="cadastro-item">
            <p>Cadastrar Medicamento</p> 
            <a href="/medicamentoForm" class="cadastrar-link">
                <i class="fas fa-plus"></i>
                <span class="status-busca"> Cadastrar </span>
            </a>
        </div>
        <div class="cadastro-item">
            <p>Cadastrar Tipo Medicamento</p> 
            <a href="/TipoMedicamento" class="cadastrar-link">
                <i class="fas fa-plus"></i>
                <span class="status-busca"> Cadastrar </span>
            </a>
        </div>
    </div>
</div>

<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h5 style="font-size: 30px;">Medicamentos</h5>
                    <form action="{{ route('medicamentos.search') }}" method="GET">
                        <input type="text" name="query" id="searchInput" placeholder="Pesquisar por nome, nome genérico, código de barras e nome do Detentor..." class="search-input" style="width: 700px;" onkeyup="if(event.key === 'Enter') this.form.submit();">
                    </form>
                    <!-- aqui tá o botão que abre o modal dos filtro (não funcionando o bck dele) -->
                <i class='bx bx-filter' data-bs-toggle="modal" data-bs-target="#filterModal"></i>
            </div>
        </div>
    </div>

    <div class="form-wrapper">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código de Barras</th>
                    <th>Nome</th>
                    <th>Nome Genérico</th>
                    <th>Situação</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @foreach($medicamento as $med)
            <tbody>
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
                                    data-foto-genero="{{ asset('storage/' . $med->fotoMedicamentoGenero) }}">
                                    Ver Foto de Gênero
                                </button>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
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
                    <!-- Situação Checklist -->
                    <div class="mb-3">
                        <label class="form-label">Situação</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="A" id="situacaoAtivo" name="situacao[]">
                            <label class="form-check-label" for="situacaoAtivo">Ativo</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="D" id="situacaoInativo" name="situacao[]">
                            <label class="form-check-label" for="situacaoInativo">Inativo</label>
                        </div>
                    </div>

                    <!-- Forma Farmacêutica Checklist -->
                    <div class="mb-3">
                        <label class="form-label">Forma Farmacêutica</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Comprimido" id="formaComprimido" name="formaFarmaceutica[]">
                            <label class="form-check-label" for="formaComprimido">Comprimido</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Cápsula" id="formaCapsula" name="formaFarmaceutica[]">
                            <label class="form-check-label" for="formaCapsula">Cápsula</label>
                        </div>
                        <!-- Adicione outros checkboxes conforme necessário -->
                    </div>

                    <!-- Tipo de Medicamento -->
                    <div class="mb-3">
                        <label for="filtroTipoMedicamento" class="form-label">Tipo de Medicamento</label>
                        <select class="form-select" id="filtroTipoMedicamento" name="tipoMedicamento">
                            <option value="">Todos os tipos de medicamento</option>
                            @foreach($tiposMedicamento as $t)
                            <option value="{{ $t->idTipoMedicamento }}">
                                {{ $t->tipoMedicamento }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Data de Cadastro -->
                    <div class="mb-3">
                        <label for="filtroDataCadastro" class="form-label">Data de Cadastro</label>
                        <input type="date" class="form-control" id="filtroDataCadastro" name="dataCadastro">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="applyFilters">Aplicar Filtros</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach    
</main>

@include('includes.footer') <!-- include -->

<!-- Link para o Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>