@include('includes.header') <!-- include -->

<!--  AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DO Cliente-->
<!--  Essa pagina não será de editar, portanto mudará as dashbord-->
<!--  VOCÊ QUE È BACK crie somente os botoes que irá para pagina das funcionalidade. ex: cadastro cliente-->

<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Cliente</h1>
			<ul class="breadcrumb">
				<li>
					<a href="/">Home</a>
				</li>
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<a class="active" href="/">Cliente</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>  Campos</h3>
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
							<p>Consultar Cliente</p>
						</td>
						<td>
							<a href="consultarCliente">
								<span class="status busca"> Consultar </span>
							</a>
						</td>
					</tr>
				
					<tr>
						<td>
							<p>Cadastrar Cliente</p>
						</td>
						<td>
							<a href="criarCliente">
								<span class="status busca"> cadastro </span>
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