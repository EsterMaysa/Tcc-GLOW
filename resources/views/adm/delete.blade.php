@include('includes.header') <!-- include -->
<section id="sidebar">
		<a href="/" class="brand">
		<span class="text1" style="margin-left: 50px;"><img src="{{ asset('/Image/busca.png')}}" width="70%"></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="/">
					<i class='bx bxs-dashboard'></i>
					<span class="text"> Início </span>
				</a>
			</li>
			<li>
				<a href="/consultar">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text"> Consultar </span>
				</a>
			</li>
			<li >
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
			<li class="active">
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


<!--  AQUI VAI O DELETE  -->


		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Delete</h1>
					<ul class="breadcrumb">
						<li>
							<a href="/">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Delete</a>
						</li>
					</ul>
				</div>
				
			</div>

	
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
@include('includes.footer') <!-- include -->
