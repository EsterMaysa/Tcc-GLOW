@include('includes.header') <!-- include -->

<!-- AQUI VAI A PÁGINA DESTINADA ÀS FUNCIONALIDADES DO MEDICAMENTO -->
<!-- Essa página não será de consulta, portanto, mudará a dashboard -->
<!-- VOCÊ QUE É BACK, crie somente os botões que irão para a página das funcionalidades. Ex: cadastro medicamento -->

<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3> Detentor</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Campo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Cadastrar</p>
                        </td>
                        <td>
                            <a href="/detentorCadastro">
                                <span class="status busca">Cadastrar</span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Email</th>
                <!-- <th>Logradouro</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>UF</th>
                <th>CEP</th>
                <th>Número</th>
                <th>Complemento</th> -->
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
                <!-- <td>{{ $d->logradouroDetentor }}</td>
                <td>{{ $d->bairroDetentor }}</td>
                <td>{{ $d->cidadeDetentor }}</td>
                <td>{{ $d->estadoDetentor }}</td>
                <td>{{ $d->ufDetentor }}</td>
                <td>{{ $d->cepDetentor }}</td>
                <td>{{ $d->numeroDetentor }}</td>
                <td>{{ $d->complementoDetentor }}</td> -->
                <td>{{ $d->situacaoDetentor }}</td>
                <td>{{ \Carbon\Carbon::parse($d->dataCadastroDetentor)->format('d/m/Y') }}</td>

                <!-- Botão para abrir o modal -->
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
                    <p><strong>Situação:</strong> {{ $d->situacaoDetentor }}</p>
                    <p><strong>Data de Cadastro:</strong> {{ \Carbon\Carbon::parse($d->dataCadastroDetentor)->format('d/m/Y') }}</p>
                  </div>
                  <div class="modal-footer">
                  <a href="{{ route('detentor.edit', $d->idDetentor) }}" class="btn btn-warning">Editar</a>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </tbody>
    </table>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->

@include('includes.footer') <!-- include -->

<!-- Link para o Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
