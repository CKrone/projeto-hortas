<?php

include("verificaloginong.php");
$cod_ong = filter_input(INPUT_GET, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Cristian Krone, Gabriel Langa e Letícia Caxoeira">
	<meta name="description" content="Sistema Web para Hortas Comunitárias">
	<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../jss/java.js">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<script src="../jss/tela.js"></script>
	
	<title>Hortas Comunitárias</title>
</head>

<body>
	<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
		<input type="hidden" name="cod_ong" value="<?php echo $_SESSION['cod_ong'];?>">
		<ul id="logo" class="nav">
			<a class="navbar-brand">Painel ONG</a>
		</ul>
		<ul id="logo" class="nav">
			<a class="navbar-brand">Olá, <?php echo $_SESSION['razaoSocial']; ?> Seja  Bem-Vindo!</a>
		</ul>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="../index.html">Página Inicial</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Editar Dados</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item"  href="editardadosong.php?cod_ong=<?php echo $_SESSION['cod_ong'];?>">Editar Dados</a></li>
					<li><a class="dropdown-item"  href="alterarsenhaong.php?cod_ong=<?php echo $_SESSION['cod_ong'];?>">Alterar Senha</a></li>
					<li><a class="dropdown-item"  href="alterarenderecoong.php?cod_ong=<?php echo $_SESSION['cod_ong'];?>">Alterar Endereco</a></li>
				</ul>				  
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gerar Relatórios</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item"  href="gerarrelatoriosong.php?cod_ong=<?php echo $_SESSION['cod_ong'];?>">Relatórios</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Solicitação</a>

					<ul class="dropdown-menu">
						<li><a class="dropdown-item"  href="solicitarhortalicas.php">Solicitar Hortaliças</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link"  href="#" onclick="sair()">Sair</a>
						</li>
						<!--a class="nav-link active" aria-current="page" href="#">Cadastrar</a-->
					</ul>
				</li>
			</nav>						
	</body>
</html>








			