	<?php
	include_once("conexao.php");
	require_once("verificaloginong.php");

	$cod_ong = FILTER_INPUT(INPUT_GET, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);
	$result_ong = "SELECT * FROM ong where cod_ong = '$cod_ong'";
	$resultado_ong = mysqli_query($conn, $result_ong);
	$row_ong = mysqli_fetch_assoc($resultado_ong);


	?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="author" content="Cristian Krone e Gabriel Langa">
		<meta name="description" content="Sistema Web para Hortas Comunitárias">
		<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
		<link href="../css/header.css" rel="stylesheet" type="text/css">

		<title>Editar Dados</title>
	</head>

	<body>
		<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
			<ul id="logo" class="nav">
				<a class="navbar-brand">Painel ONG</a>
			</ul>
			<ul id="logo" class="nav">
				<a class="navbar-brand"></a>
			</ul>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link" href="telaong.php">Página ONG</a>
				</li>
			</ul>
		</nav>

		<div class="card bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center">Editar Dados </h4>

				<form method="POST" action="processa_edit_dadosong.php">
					<?php
					if (isset($_SESSION['msg'])) {
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<input name="cod_ong" type="hidden" class="form-control" value="<?php echo $_SESSION['cod_ong']; ?>">
						</div>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						</div>
						<input name="email" class="form-control" value="<?php echo $row_ong['email']; ?>" placeholder="E-mail " type="email" required>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						</div>
						<input name="telefone" id="telefone" class="form-control" value="<?php echo $row_ong['telefone']; ?>" placeholder="Telefone" type="text" onkeypress="return ApenasNumeros(event,this);" required>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						</div>
						<input name="celular" id="celular" class="form-control" value="<?php echo $row_ong['celular']; ?>" placeholder="Celular" type="text" onkeypress="return ApenasNumeros(event,this);" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"> Editar Dados </button>
					</div>
				</form>
			</article>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
			<script src="../jss/jquery-3.6.0.min.js"></script>
			<script src="../jss/jquery.maskedinput-1.1.4.pack.js"></script>
			<script src="../jss/tela.js"></script>
	</body>

	</html>