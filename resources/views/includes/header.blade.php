<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!-- Nosso CSS -->
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/clienteConsulta.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/perfil.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/notificacoes.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/configuracoes.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<title> Dashboard Administrador | BuscaSUS </title>
	<link rel="shortcut icon" href="{{ asset('/Image/favicon (1).ico') }}" type="image/x-icon">

</head>

<body>
	<section id="sidebar">
		<a href="/" class="brand">
			<span class="text1" style="margin-left: 50px;"><img src="{{ asset('/Image/busca.png')}}" width="70%"></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
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
				<a href="/admPerfil" class="boto2">
					<i class='bx bxs-user'></i>
					<span class="text"> Perfil </span>
				</a>
    		</li>
    		<li>
			<form action="/logout" method="POST" style="display: inline;">
				@csrf 
				<button type="submit" class="boto2"><i class='bx bxs-log-out-circle' id="logout-icon"></i>
				<span class="text"> Sair </span></button>
				

			</form>
    		</li>
		</ul>

	</section>
	
	<section id="content">
		<nav>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Buscar...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<a href="/notificacoes" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num"> 4 </span>
			</a>
			<a href="/admPerfil" class="profile">
				<img src="{{ asset('/Image/perfilAzulAdm.png') }}">
			</a>
		</nav>
