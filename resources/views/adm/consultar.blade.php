@include('includes.header') <!-- include -->
<!--  AQUI VAI O SELECT  -->
<section id="sidebar">
		<a href="/" class="brand">
		<span class="text1" style="margin-left: 50px;"><img src="{{ asset('/Image/logoAdm.png')}}" width="70%"></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="/">
					<i class='bx bxs-dashboard'></i>
					<span class="text"> Início </span>
				</a>
			</li>
			<li class="active">
				<a href="/consultar">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text"> Consultar </span>
				</a>
			</li>
			<li>
				<a href="/alterar">
					<i class='bx bxs-edit bx-flip-horizontal' style='color:#3f3e3e' ></i>
					<span class="text"> Alterar </span>
				</a>
			</li>
			
			<li>
				<a href="/create">
					<i class='bx bxs-plus-circle'></i>
					<span class="text"> Criar </span>
				</a>
			</li>
			<li>
				<a href="/mensagem">
					<i class='bx bxs-message-dots'></i>
					<span class="text"> Mensagens </span>
				</a>
			</li>
			<li>
				<a href="/delete" class="logoutTrash">
					<i class='bx bxs-trash'></i>
					<span class="text"> Deletar </span>				
				</a>
			</li>

		</ul>
		<ul class="boto">
    		<li>
				<a href="/configuracoes" class="boto2">
					<i class='bx bxs-cog'></i>
					<span class="text"> Configurações </span>
				</a>
    		</li>
			<li>
				<a href="/perfil" class="boto2">
					<i class='bx bxs-user'></i>
					<span class="text"> Perfil </span>
				</a>
    		</li>
    		<li>
				<a href="#" class="boto2">
				<i class='bx bxs-log-out-circle' id="logout-icon"></i>
					<span class="text"> Sair </span>
				</a>
    		</li>
		</ul>

	</section>
<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1> Consultar </h1>
			<ul class="breadcrumb">
				<li>
					<a href="/"> Home </a>
				</li>
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<a class="active" href="/"> Consultar </a>
				</li>
			</ul>
		</div>
	</div>
	<!--Aqui esta as tabelas para o select-->
	<!--Depois colocar uma barra de rolagem dentro dessa div-->
	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3> Consultar Campos</h3>
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
							<p>Clientes</p>
						</td>
						<td>
							<a href="/getUsuario">
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