<?php
include("verificaloginadm.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Cristian Krone, Gabriel Langa e Letícia Caxoeira">
	<meta name="description" content="Sistema Web para Hortas Comunitárias">
	<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> 
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<title>Hortas Comunitárias</title>
</head>
<body>
	<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
		<ul id="logo" class="nav">
			<a class="navbar-brand">Painel Administrador</a>
		</ul>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="../index.html">Página Inicial</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gerar Relatórios</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item"  href="#">Relatórios</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gerenciar</a>

				<ul class="dropdown-menu">
					<li><a class="dropdown-item"  href="listarprodutores.php">Gerenciar Produtores</a></li>
					<li><a class="dropdown-item"  href="listarong.php">Gerenciar ONGs</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link"  href="logout.php">Sair</a>
					</li>
					<!--a class="nav-link active" aria-current="page" href="#">Cadastrar</a-->
				</li>
			</ul>
		</nav>
		<h2>OLÁ ADMINISTRADOR</h2>

	</body>
	</html>