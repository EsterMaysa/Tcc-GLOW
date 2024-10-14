@include('includes.header') <!-- include -->

<!--  AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DO MEDICAMENTO-->
<!--  Essa pagina não será de consultar, portanto mudará as dashbord-->
<!--  VOCÊ QUE È BACK crie somente os botoes que irá para pagina das funcionalidade. ex: cadastro medicameento-->

<!-- MAIN -->
<main>
	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3> cadastros</h3>
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
							<p>  Medicamento</p>
						</td>
						<td>
							<a href="/medicamentoForm">
								<span class="status busca">Consultar</span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p> Detentor</p>
						</td>
						<td>
							<a href="/">
								<span class="status busca">Consultar</span>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="table-data">
        <div class="order">
            <div class="head">
                <h3> Medicamentos</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Código de Barras</th>
                        <th>Nome</th>
                        <th>Nome Genérico</th>
                        <th>Registro ANVISA</th>
                        <th>Forma Farmacêutica</th>
                        <th>Concentração</th>
						<th>Situação</th>
						<th>Data de Cadastro</th>
						<th>Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($medicamento as $med)
                    <tr>
                        <td style="padding: 10px;">{{ $med->codigoDeBarrasMedicamento }}</td>
                        <td>{{ $med->nomeMedicamento }}</td>
                        <td>{{ $med->nomeGenericoMedicamento }}</td>
                        <td>{{ $med->registroAnvisaMedicamento }}</td>
                        <td>{{ $med->formaFarmaceuticaMedicamento }}</td>
                        <td>{{ $med->concentracaoMedicamento }}</td>
						<td>{{ $med->detentor->nomeDetentor ?? 'N/A' }}</td>
						<td>{{ $med->tipoMedicamento->tipoMedicamento ?? 'N/A' }}</td>
                        <td>{{ $med->situacaoMedicamento }}</td>
						<td>{{ \Carbon\Carbon::parse($med->dataCadastroMedicamento)->format('d/m/Y') }}</td>
						<td>Editar</td>

					</tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- MAIN -->
</main>
</section>
<!-- CONTENT -->

@include('includes.footer') <!-- include -->