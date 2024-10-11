@include('includes.header') <!-- include -->

<!--  AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DO MEDICAMENTO-->
<!--  Essa pagina não será de consultar, portanto mudará as dashbord-->
<!--  VOCÊ QUE È BACK crie somente os botoes que irá para pagina das funcionalidade. ex: cadastro medicameento-->

<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1> Medicamentos </h1>
			<ul class="breadcrumb">
				<li>
					<a href="/"> Home </a>
				</li>
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<a class="active" href="/"> Medicamento </a>
				</li>
			</ul>
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
						<th>Campo</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<p> Cadastro</p>
						</td>
						<td>
							<a href="/">
								<span class="status busca">Consultar</span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Comentario</p>
						</td>
						<td>
							<a href="/">
								<span class="status busca">Consultar</span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Contato</p>
						</td>
						<td>
							<a href="#">
								<span class="status busca">Consultar</span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Estoque</p>
						</td>
						<td>
							<a href="#">
								<span class="status busca">Consultar</span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Farmacia</p>
						</td>
						<td>
							<a href="#">
								<span class="status busca">Consultar</span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Notificação de Comentarios</p>
						</td>
						<td>
							<a href="#">
								<span class="status busca">Consultar</span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Notificação de Estoque</p>
						</td>
						<td>
							<a href="#">
								<span class="status busca">Consultar</span>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
<!-- MAIN -->
</main>
</section>
<!-- CONTENT -->

@include('includes.footer') <!-- include -->