<?php
//session_start();
//include_once("conexao.php");
include("verificalogin.php");
$cod_produtor = filter_input(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Cristian Krone, Gabriel Langa e Letícia Caxoeira">
	<meta name="description" content="Sistema Web para Hortas Comunitárias">
	<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link href="css/style.css" rel="stylesheet" type="text/css">

	<title>Hortas Comunitárias</title>
</head>

<body>
	<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
		<input type="hidden" name="cod_produtor" class="form-control" value="<?php echo $_SESSION['cod_produtor']; ?>">
		<ul id="logo" class="nav">
			<a class="navbar-brand">Painel Produtor</a>
		</ul>
		<ul id="logo" class="nav">
			<a class="navbar-brand">Olá, <?php echo $_SESSION['nome']; ?> Seja Bem-Vindo!</a>
		</ul>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="../index.html">Página Inicial</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Editar Dados</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="editardadosprodutor.php?cod_produtor=<?php echo $_SESSION['cod_produtor']; ?>">Editar Dados</a></li>
					<li><a class="dropdown-item" href="alterarsenhaprodutor.php?cod_produtor=<?php echo $_SESSION['cod_produtor']; ?>">Alterar Senha</a></li>
					<li><a class="dropdown-item" href="alterarenderecoprodutor.php?cod_produtor=<?php echo $_SESSION['cod_produtor']; ?>">Alterar Endereco</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gerar Relatórios</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="gerarrelatorios.php?cod_produtor=<?php echo $_SESSION['cod_produtor']; ?>">Relatórios</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Informar</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="informarHortalicas.php">Informar Hortaliças</a></li>
					<li><a class="dropdown-item" href="atualizarhortalicas.php">Atualizar Hortaliças</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Sair</a>
					</li>
			</li>
		</ul>
	</nav>
</body>
</html>