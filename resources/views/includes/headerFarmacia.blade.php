<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!-- Nosso CSS -->

	<link rel="stylesheet" href="{{ asset('/css/perfilFarmacia.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/cadFarmacia.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/styleFarm.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<title> Dashboard Farmácia | FarmaSUS </title>
	<link rel="shortcut icon" href="{{ asset('/Image/favicon (1).ico') }}" type="image/x-icon">

</head>

<body>
	<section id="sidebar">
		<a href="/homeFarmacia" class="brand">
			<span class="text1" style="margin-left: 50px;"><img src="{{ asset('/Image/logoFarma.png')}}" width="70%"></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="/homeFarmacia">
					<i class='bx bxs-dashboard'></i>
					<span class="text"> Início </span>
				</a>
			</li>
			<li>
				<a href="/estoque">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text"> Estoque </span>
				</a>
			</li>
			<li>
				<a href="/cadastros">
					<i class='bx bxs-edit bx-flip-horizontal' style='color:#3f3e3e' ></i>
					<span class="text"> Inserir Cliente </span>
				</a>
			</li>
			<!-- <li> FOI PARA O ADM
				<a href="/medicamentos">
					<i class='bx bxs-edit bx-flip-horizontal' style='color:#3f3e3e' ></i>
					<span class="text"> Inserir Medicamento </span>
				</a>
			</li> -->
			<!-- <li>
				<a href="">
					<i class='bx bxs-edit bx-flip-horizontal' style='color:#3f3e3e' ></i>
					<span class="text"> Relatório </span>
				</a>
			</li> -->
	
			<li>
				<a href="">
					<i class='bx bxs-message-dots'></i>
					<span class="text"> Mensagens </span>
				</a>
			</li>
		</ul>
		<ul class="boto">
    		<li>
				<a href="" class="boto2">
					<i class='bx bxs-cog'></i>
					<span class="text"> Configurações </span>
				</a>
    		</li>
			<li>
				<a href="/perfilFarmacia" class="boto2">
					<i class='bx bxs-user'></i>
					<span class="text"> Perfil </span>
				</a>
    		</li>
    		<li>
			<form action="/farmaLogout" method="POST" style="display: inline;">
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
				<div class="form-input" >
					<input type="search" placeholder="Buscar...">
					<button type="submit" class="search-btn" style="background-color: #265C4B;"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<a href="" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num"> 4 </span>
			</a>
			<a href="/perfilFarmacia" class="profile">
				<img src="{{ asset('/Image/perfilFarmVerde.png') }}">
			</a>
		</nav>
