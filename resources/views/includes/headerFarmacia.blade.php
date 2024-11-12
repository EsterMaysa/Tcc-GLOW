<!--CSS OK(ASS:Duda)-->

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
	<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/headerFarmacia.css')}}">

	<!--Título e favicon da página-->
	<title>Dashboard Farmácia | FarmaSUS</title>
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
					<p>Olá Farmácia!</p>
					@endif
				</div>
			</div>
			<ul>
				<li><a href="/homeFarmacia"><img src="{{ asset('Image/dashboard.png')}}"><p>Painel</p></a></li>
				<li><a href="/estoqueHome"><img src="{{ asset('Image/reports.png')}}"><p>Estoque</p></a></li>
				<li><a href="/MedicamentoHome"><img src="{{ asset('Image/reports.png')}}"><p> Medicamentos </p></a></li>
				<li><a href="/EntradaMedicamentoHome"><img src="{{ asset('Image/reports.png')}}"><p>Entrada Medicamentos</p></a></li>
				<li><a href="/saidaLista"><img src="{{ asset('Image/reports.png')}}"><p>Saída Medicamentos</p></a></li>
				<li><a href="/funcionarios"><img src="{{ asset('Image/reports.png')}}"><p> Funcionário </p></a></li>
				<li><a href="/entrada_medicamento"><img src="{{ asset('Image/reports.png')}}"><p> Tipo Movimentação </p></a></li>
			</ul>
			<ul>
				<li>
					<form id="logout-form" action="/login" method="POST" style="display: none;">
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
