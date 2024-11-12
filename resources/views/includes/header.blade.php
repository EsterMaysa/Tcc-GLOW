<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--Tags Obrigátórias!-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Boxicons-->
	<link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<!--CSS-->
	<link rel="stylesheet" href="{{ asset('css/header.css')}}">

	<!--Título e favicon da página-->
	<title>Dashboard Administrador | FarmaSUS</title>
	<link rel="shortcut icon" href="{{ asset('Image/favicon.ico')}}" type="image/x-icon">
</head>

<body>
	<div class="header">
		<div class="side-nav">
			<div class="user">
				<div>
					@if(Auth::check()) <!-- Verifica se o usuário está logado -->
					<h2>{{ Auth::user()->nomeAdministrador }}</h2> <!-- Exibe o nome do administrador logado -->
					<p>Administrador(a)</p>
					@else
					<p>Olá Administrador!</p>
					@endif
				</div>
			</div>
			<ul>
				<li><a href="/"><img src="{{ asset('Image/dashboard.png')}}"><p>Painel</p></a></li>
				<li><a href="/medicamento"><img src="{{ asset('Image/reports.png')}}"><p>Medicamentos</p></a></li>
				<li><a href="/medicamentoForm"><img src="{{ asset('Image/reports.png')}}"><p> Cadastro Medicamentos</p></a></li>
				<li><a href="/detentor"><img src="{{ asset('Image/reports.png')}}"><p>Cadastro Detentor</p></a></li>
				<li><a href="/selectUBS"><img src="{{ asset('Image/reports.png')}}"><p>Unidades Básicas de Saúde</p></a></li>
				<li><a href="/selectRegiaoForm"><img src="{{ asset('Image/reports.png')}}"><p>Cadastro de UBS</p></a></li>
				<li><a href="/cliente"><img src="{{ asset('Image/reports.png')}}"><p>Pacientes</p></a></li>
				<li><a href="/contato"><img src="{{ asset('Image/messages.png')}}"><p>Mensagens</p></a></li>
			</ul>
			<ul style="margin-bottom: 40%;">
				<li>
					<form id="logout-form" action="/logout" method="POST" style="display: none;">
						@csrf
					</form>
					<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<img src="{{ asset('Image/logout.png') }}">
						<p>Sair</p>
					</a>
				</li>
			</ul>
		</div>
	</div>