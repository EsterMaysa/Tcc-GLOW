@include('includes.header') <!-- include -->
<link rel="stylesheet" href="{{ url('css/Detentor.css')}}">

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
        <h1>Detentores</h1>
        <p>Crie novos e consulte detentores</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/geren.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<div class="cadastros-container">
    <h3><i class='bx bx-plus-circle' style="margin-right: 6px;"></i> Cadastrar</h3>
    <div class="cadastros-list">
        <div class="cadastro-item">
            <p>Cadastrar Detentor</p> 
            <a href="/detentorCadastro" class="cadastrar-link">
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
                <!-- Título de Pesquisa -->
                <h5 style="font-size: 30px;">Detentores</h5>
                
                <!-- Formulário de Pesquisa para quando tiver -->
                <form action="" method="GET">
                    <div class="search-container2">
                        <input type="text" name="query" placeholder="Nome, CPF, CNS ou UF" aria-label="Pesquisar Detentores" value="{{ request('query') }}" class="search-input2">
                        <button class="search-button2" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="form-wrapper">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Situação</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detentores as $d)
                    <tr>
                        <td>{{ $d->nomeDetentor }}</td>
                        <td>{{ $d->cnpjDetentor }}</td>
                        <td>{{ $d->emailDetentor }}</td>
                        <!-- <td>{{ $d->situacaoDetentor }}</td> -->
                        <td>
                            @if( $d->situacaoDetentor === 'A')
                            Ativado
                            @elseif( $d->situacaoDetentor === 'D')
                            Desativado
                            @else
                            Indefinido
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($d->dataCadastroDetentor)->format('d/m/Y') }}</td>
                        <!-- Botão para abrir o modal -->
                        <td>
                            <a href="{{ route('detentor.edit', $d->idDetentor) }}" class="btn btn-warning">Editar</a>
                        </td>
                        <td>
                            <!-- Botão para desativar -->
                            <form action="{{ route('desativarDetentor', $d->idDetentor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT') <!-- Usando PUT para indicar a atualização -->
                                <button type="submit" class="btn btn-danger">Desativar</button>
                            </form>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetalhes{{ $d->idDetentor }}">
                                Ver mais
                            </button>
                        </td>

                    </tr>

                    <!-- Modal para os detalhes -->
                    <div class="modal fade" id="modalDetalhes{{ $d->idDetentor }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalhes do Detentor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nome:</strong> {{ $d->nomeDetentor }}</p>
                                    <p><strong>CNPJ:</strong> {{ $d->cnpjDetentor }}</p>
                                    <p><strong>Email:</strong> {{ $d->emailDetentor }}</p>
                                    <p><strong>Logradouro:</strong> {{ $d->logradouroDetentor }}</p>
                                    <p><strong>Bairro:</strong> {{ $d->bairroDetentor }}</p>
                                    <p><strong>Cidade:</strong> {{ $d->cidadeDetentor }}</p>
                                    <p><strong>Estado:</strong> {{ $d->estadoDetentor }}</p>
                                    <p><strong>UF:</strong> {{ $d->ufDetentor }}</p>
                                    <p><strong>CEP:</strong> {{ $d->cepDetentor }}</p>
                                    <p><strong>Número:</strong> {{ $d->numeroDetentor }}</p>
                                    <p><strong>Complemento:</strong> {{ $d->complementoDetentor }}</p>
                                    <p><strong>Situação:</strong> 
                                    @if( $d->situacaoDetentor === 'A')
                                        Ativado
                                    @elseif( $d->situacaoDetentor === 'D')
                                        Desativado
                                    @else
                                        Indefinido
                                    @endif
                                    </p>
                                    <p><strong>Data de Cadastro:</strong> {{ \Carbon\Carbon::parse($d->dataCadastroDetentor)->format('d/m/Y') }}</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('detentor.edit', $d->idDetentor) }}" class="btn btn-warning">Editar</a>
                                    <!-- Botão para desativar -->
                                    <form action="{{ route('desativarDetentor', $d->idDetentor) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT') <!-- Usando PUT para indicar a atualização -->
                                        <button type="submit" class="btn btn-danger">Desativar</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

</main>

@include('includes.footer') <!-- include -->

<!-- Link para o Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>