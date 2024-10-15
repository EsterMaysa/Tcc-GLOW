@include('includes.header') <!-- include -->

<!--  AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DO MEDICAMENTO-->
<!--  Essa pagina não será de consultar, portanto mudará as dashbord-->
<!--  VOCÊ QUE È BACK crie somente os botoes que irá para pagina das funcionalidade. ex: cadastro medicameento-->

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
                            <p> Cadastrar</p>
                        </td>
                        <td>
                            <a href="/detentorCadastro">
                                <span class="status busca">cadastrar</span>
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
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>UF</th>
                <th>CEP</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detentores as $d)
            <tr>
                <td>{{ $d->nomeDetentor }}</td>
                <td>{{ $d->cnpjDetentor }}</td>
                <td>{{ $d->emailDetentor }}</td>
                <td>{{ $d->logradouroDetentor }}</td>
                <td>{{ $d->bairroDetentor }}</td>
                <td>{{ $d->cidadeDetentor }}</td>
                <td>{{ $d->estadoDetentor }}</td>
                <td>{{ $d->ufDetentor }}</td>
                <td>{{ $d->cepDetentor }}</td>
                <td>{{ $d->numeroDetentor }}</td>
                <td>{{ $d->complementoDetentor }}</td>
                <td>{{ $d->situacaoDetentor }}</td>
                <td>
                    <a href="{{ route('detentor.edit', $d->idFDetentor) }}">
                        <p style="color: red;">Editar</p>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <!-- MAIN -->
</main>
</section>
<!-- CONTENT -->

@include('includes.footer') <!-- include -->