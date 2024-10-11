@include('includes.header') <!-- include -->

<!--  AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DA UBS-->
<!--  Essa pagina não será de create, portanto mudará as dashbord-->
<!--  VOCÊ QUE È BACK crie somente os botoes que irá para pagina das funcionalidade. ex: cadastro ubs-->

		<!-- MAIN -->
		<main>
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
							<a href="/">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Medicamento</p>
						</td>
						<td>
							<a href="medicamentos">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Região</p>
						</td>
						<td>
							<a href="regiaoInsert">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Comentario</p>
						</td>
						<td>
							<a href="comentarioInsert">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Contato</p>
						</td>
						<td>
							<a href="contatoInsert">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Estoque</p>
						</td>
						<td>
							<a href="estoqueInsert">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Farmacia</p>
						</td>
						<td>
							<a href="farmaciaInsert">
								<span class="status busca"> Criar </span>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
@include('includes.footer') <!-- include -->
