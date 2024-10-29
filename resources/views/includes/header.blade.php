
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
	<link rel="stylesheet" href="{{ url('css/header.css')}}">
	
	<!--Título e favicon da página-->
	<title>Dashboard FarmaSUS</title>
	<link rel="shortcut icon" href="{{ asset('Image/favicon.ico')}}" type="image/x-icon">
</head>
<body>

	<div class="header">
		<div class="side-nav">
			<div class="user">
				<img src="{{ asset('Image/adm.png')}}" alt="foto-perfil" class="user-img">
				<div>
					<h2> Gabrielly Vasconcelos </h2>
					<p>Administrador(a)</p>
				</div>
			</div>
			<ul>
				<li><a href="/"><img src="{{ asset('Image/dashboard.png')}}"><p>Painel</p></a></li>
				<li><a href="/medicamento"><img src="{{ asset('Image/reports.png')}}"><p>Medicamentos</p></a></li>
				<li><a href="/medicamentoForm"><img src="{{ asset('Image/reports.png')}}"><p> Cadastro Medicamentos</p></a></li>
				<li><a href="/detentor"><img src="{{ asset('Image/reports.png')}}"><p>Cadastro Detentor</p></a></li>
				<li><a href="/selectUBS"><img src="{{ asset('Image/rewards.png')}}"><p>Unidades Básicas de Saúde</p></a></li>
				<li><a href="/selectRegiaoForm"><img src="{{ asset('Image/reports.png')}}"><p>Cadastro de UBS</p></a></li>
				<li><a href="/cliente"><img src="{{ asset('Image/projects.png')}}"><p>Pacientes</p></a></li>
				<li><a href="/contato"><img src="{{ asset('Image/messages.png')}}"><p>Mensagens</p></a></li>	
			</ul>
			<ul>
				<li><a href="/perfil"><img src="{{ asset('Image/members.png')}}"><p>Perfil</p></a></li>
				<li><a href="/configuracoes"><img src="{{ asset('Image/setting.png')}}"><p> Configurações </p></a></li>
				<li><a href="/logout"><img src="{{ asset('Image/logout.png')}}"><p>Sair</p></a></li>
			</ul>
		</div>
	</div>

