<!-- <!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	Boxicons -->
	<!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->


	<!-- Nosso CSS -->
	<!-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/clienteConsulta.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/perfil.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/notificacoes.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/configuracoes.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<title> Dashboard Administrador | FarmaSUS </title>
	<link rel="shortcut icon" href="{{ asset('/Image/favicon (1).ico') }}" type="image/x-icon">

</head>

<body>
	<section id="sidebar">
		<a href="/" class="brand">
			<span class="text1" style="margin-left: 50px;"><img src="{{ asset('/Image/logoAdm.png')}}" width="70%"></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="/">
					<i class='bx bxs-dashboard'></i>
					<span class="text"> Início </span>
				</a>
			</li>
			<li>
				<a href="/medicamento">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text"> Medicamento </span>
				</a>
			</li> -->
			<!-- <li>
				<a href="/medicamentoForm">
					<i class='bx bxs-plus-circle'></i>

					<span class="text"> Cadastro Medicamento </span>
				</a>
			</li>
			<li>
				<a href="/detentor">

					<i class='bx bxs-plus-circle'></i>

					<span class="text"> Cadastro Detentor </span>
				</a>
			</li> -->
			<!-- <li>
				<a href="/selectUBS">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text"> UBS </span>
				</a>
			</li>
			<li>

				<a href="/selectRegiaoForm">

					<i class='bx bxs-plus-circle'></i>
					<span class="text"> Cadastrar UBS </span>

				<i class='bx bxs-plus-circle'></i>
				<span class="text"> Cadastrarrr UBS </span>
				</a>
			</li>

			<li>
				<a href="/insertFarmaciaUbs">
				<i class='bx bxs-plus-circle'></i>
				<span class="text"> Cadastrar Farmacia </span>

				</a>
			</li>


			<li>
				<a href="/Cliente">
					<i class='bx bxs-plus-circle'></i>
					<span class="text"> Paciente </span>
				</a>
			</li>

			<li>
				<a href="/contato">
					<i class='bx bxs-message-dots'></i>
					<span class="text"> Mensagens </span>
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
				<form action="/logout" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja sair?');">
					@csrf 
					<button type="submit" class="boto2"><i class='bx bxs-log-out-circle' id="logout-icon"></i>
					<span class="text"> Sair </span></button
				</form>
				<! <a href="/login" class="boto2">
					<i class='bx bxs-log-out-circle' id="logout-icon"></i>
					<span class="text"> Sair </span>
				</a> -->
			<!-- </li>
		</ul>
		</form>
	</section> -->
<!-- 
	<section id="content">
		<nav>
			
			<a href="/notificacoes" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num"> 4 </span>
			</a>
			<a href="/perfil" class="profile">
				<img src="{{ asset('/Image/perfilAzulAdm.png') }}">
			</a>
		</nav> -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


	<!-- Nosso CSS -->
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/clienteConsulta.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/perfil.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/notificacoes.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/configuracoes.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<title> Dashboard Administrador | FarmaSUS </title>
	<link rel="shortcut icon" href="{{ asset('/Image/favicon (1).ico') }}" type="image/x-icon">

</head>

<body>
	<section id="sidebar">
		<a href="/" class="brand">
			<span class="text1" style="margin-left: 50px;"><img src="{{ asset('/Image/logoAdm.png')}}" width="70%"></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="/">
					<i class='bx bxs-dashboard'></i>
					<span class="text"> Início </span>
				</a>
			</li>
			<li>
				<a href="/medicamento">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text"> Medicamento </span>
				</a>
			</li>
			<li>
				<a href="/medicamentoForm">
					<i class='bx bxs-plus-circle'></i>

					<span class="text"> Cadastro Medicamento </span>
				</a>
			</li>
			<li>
				<a href="/detentor">

					<i class='bx bxs-plus-circle'></i>

					<span class="text"> Cadastro Detentor </span>
				</a>
			</li>
			<li>
				<a href="/selectUBS">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text"> UBS </span>
				</a>
			</li>
			<li>

				<a href="/selectRegiaoForm">
					<i class='bx bxs-plus-circle'></i>
					<span class="text"> Cadastrar uma UBS </span>
				</a>
			</li>

			<li>
				<a href="/insertFarmaciaUbs">
				<i class='bx bxs-plus-circle'></i>
				<span class="text"> Cadastrar uma Farmacia </span>
				</a>
			</li>

			<li>
				<a href="/Cliente">
					<i class='bx bxs-plus-circle'></i>
					<span class="text"> Paciente </span>
				</a>
			</li>

			<li>
				<a href="/contato">
					<i class='bx bxs-message-dots'></i>
					<span class="text"> Mensagens </span>
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
				<!-- <form action="/logout" method="POST" style="display: inline;">
					@csrf 
					<button type="submit" class="boto2"><i class='bx bxs-log-out-circle' id="logout-icon"></i>
					<span class="text"> Sair </span></button
				</form> -->
				<a href="/login" class="boto2">
					<i class='bx bxs-log-out-circle' id="logout-icon"></i>
					<span class="text"> Sair </span>
				</a>
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
			<a href="/perfil" class="profile">
				<img src="{{ asset('/Image/perfilAzulAdm.png') }}">
			</a>
		</nav>