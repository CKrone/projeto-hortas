<?php

include_once("conexao.php");
include("verificalogin.php");
$cod_produtor = filter_input(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Cristian Krone e Gabriel Langa">
	<meta name="description" content="Sistema Web para Hortas Comunitárias">
	<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/header.css">

	<title>Painel Produtor</title>
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
					<li><a class="dropdown-item" id="logout_link2" href="#">Informar Hortaliças</a></li>
					<li><a class="dropdown-item" href="atualizarhortalicas.php">Atualizar Hortaliças</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" href="#" title="Logout" id="logout_link">Sair</a>
					</li>
			</li>
		</ul>
	</nav>
	<?php
	$contador = 0;
	$result_pedido = "SELECT cod_pedido, data_entrega FROM pedido where cod_produtor = '$_SESSION[cod_produtor]'";
	$resultado_pedido = mysqli_query($conn, $result_pedido);
	while ($row = mysqli_fetch_assoc($resultado_pedido)) {
		$cod_pedido = $row['cod_pedido'];
		$data_entrega = $row['data_entrega'];
		if ($data_entrega == null) {
			$contador++;
		}
	}
	if ($contador > 0) {
		echo "<br><h4><strong>Existe uma solicitação em aberto! Veja no menu relatórios! Ou  
<a href='gerarrelatorios.php?cod_produtor=$_SESSION[cod_produtor];'>Clique Aqui</a><br></strong></h4>";
	}
	?>

	<div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="logoutlabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="logoutlabel">Pergunta</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Deseja sair do sistema?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="logout_modal_sim">Sim</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
				</div>
			</div>
		</div>
	</div>

	<!--Modal para informar sobre atualização de hortaliças!-->
	<div class="modal fade" id="logout_modal2" tabindex="-1" aria-labelledby="logoutlabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="logoutlabel2">Aviso</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal2" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Produtor! Caso deseje informar hortaliças que você já doou, clique em "Voltar", vá ao menu "Informar"
					e selecione a opção "Atualizar Hortaliças" ou clique em "Continuar" para cadastrar novas hortaliças!!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="logout_modal_sim2">Continuar</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="../jss/bootstrap.bundle.min.js"></script>
	<script src="../jss/jquery-3.6.0.min.js"></script>
	<script src="../jss/meumodal.js"></script>
	<script src="../jss/tela.js"></script>
</body>

</html>