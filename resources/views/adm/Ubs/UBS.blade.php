@include('includes.header') <!-- include -->

<!--  AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DA UBS-->
<!--  Essa pagina não será de create, portanto mudará as dashbord-->
<!--  VOCÊ QUE È BACK crie somente os botoes que vini irá para pagina das funcionalidade. ex: cadastro ubs-->

		<!-- MAIN -->
		<main>
		<style>
    .ubs-table {
    width: 100%; /* A tabela ocupa 100% da largura disponível */
    border-collapse: collapse; /* Remove espaços entre as bordas das células */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra para a tabela */
    border-radius: 8px; /* Bordas arredondadas */
    overflow: hidden; /* Para garantir que as bordas arredondadas apareçam */
    margin-top: 20px; /* Espaço acima da tabela */
}

.ubs-table th, .ubs-table td {
    padding: 20px; /* Aumenta o espaçamento interno (padding) das células */
    text-align: left; /* Alinha o conteúdo à esquerda */
    border: 1px solid #ddd; /* Borda leve em cada célula */
}

.ubs-table th {
    background-color: #f2f2f2; /* Cor de fundo para o cabeçalho */
    font-weight: bold; /* Deixa o texto do cabeçalho em negrito */
    font-size: 1.1em; /* Aumenta o tamanho da fonte do cabeçalho */
}

.ubs-row:nth-child(even) {
    background-color: #f9f9f9; /* Cor de fundo para linhas pares */
}

.ubs-image {
    max-width: 100px; /* Define o tamanho máximo das imagens */
    height: auto; /* Mantém a proporção da imagem */
    border-radius: 5px; /* Bordas arredondadas nas imagens */
}

.ubs-row:hover {
    background-color: #e9e9e9; /* Cor de fundo ao passar o mouse nas linhas */
}

.ubs-table td {
    line-height: 1.5; /* Aumenta a altura da linha para melhor legibilidade */
}



</style>
			<div class="head-title">
				<div class="left">
					<h1> Criar </h1>
					<ul class="breadcrumb">
						<li>
							<a href="/">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="/"> UBS </a>
						</li>
					</ul>
				</div>
			</div>
			<div class="table-data">
		<div class="order">
			<div class="head">
				<h3> Criar Campos</h3>
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
						<p>Posto</p>
					</td>
					<td>
					<a href="/selectRegiaoForm">
						<span class="status busca">Criar</span>
					</a>

					</td>
				</tr>

						<!-- <td>
							<p>Medicamento</p>
						</td>
						<td>
							<a href="medicamentos">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr> -->
					<tr>
						<td>
							<p>Região</p>
						</td>
						<td>
							<a href="('formRegiao')">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
					<tr>
						<!-- <td>
							<p>Comentario</p>
						</td>
						<td>
							<a href="comentarioInsert">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr> -->
					<tr>
						<!-- <td>
							<p>Contato</p>
						</td>
						<td>
							<a href="contatoInsert">
								<span class="status busca"> Criar </span>
							</a>
						</td> -->
					</tr>
					<tr>
						<!-- <td>
							<p>Estoque</p>
						</td>
						<td>
							<a href="estoqueInsert">
								<span class="status busca"> Criar </span>
							</a>
						</td> -->
					</tr>
					<tr>
						<td>
							<p>Farmacia</p>
						</td>
						<td>
						<a href="/insertFarmacia"> <!-- Usando a função route -->
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Telefone</p>
						</td>
						<td>
							<a href="formTelefone">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
					

				</tbody>
			</table>

			
        </thead>

<br>
		<div class="head">
				<h3>Lista de Unidades Básicas de Saúde (UBS)</h3>
				<i class='bx bx-search'></i>
				<i class='bx bx-filter'></i>
			</div>
			<table>
				<thead>
					<tr>
						<th>Campo</th>
					</tr>
</thead>
</table>
    	<table class="ubs-table">
		
        <tr>
            <th>ID UBS</th>
            <th>Nome UBS</th>
            <th>Foto UBS</th>
            <th>CNPJ UBS</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>CEP</th>
            <th>Logradouro</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Número</th>
            <th>UF</th>
            <th>Complemento</th>
            <th>Situação</th>
            <th>Data Cadastro</th>
            <th>ID Telefone</th>
            <th>ID Região</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ubs as $unidade)
            <tr class="ubs-row">
                <td>{{ $unidade->idUBS }}</td>
                <td>{{ $unidade->nomeUBS }}</td>
                <td><img class="ubs-image" src="{{ $unidade->fotoUBS }}" alt="Foto UBS"></td>
                <td>{{ $unidade->cnpjUBS }}</td>
                <td>{{ $unidade->latitudeUBS }}</td>
                <td>{{ $unidade->longitudeUBS }}</td>
                <td>{{ $unidade->cepUBS }}</td>
                <td>{{ $unidade->logradouroUBS }}</td>
                <td>{{ $unidade->bairroUBS }}</td>
                <td>{{ $unidade->cidadeUBS }}</td>
                <td>{{ $unidade->estadoUBS }}</td>
                <td>{{ $unidade->numeroUBS }}</td>
                <td>{{ $unidade->ufUBS }}</td>
                <td>{{ $unidade->complementoUBS }}</td>
                <td>{{ $unidade->situacaoUBS }}</td>
                <td>{{ $unidade->dataCadastroUBS }}</td>
                <td>{{ $unidade->idTelefoneUBS }}</td>
                <td>{{ $unidade->idRegiaoUBS }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    </table>
		</div>
	</div>

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
@include('includes.footer') <!-- include -->
