<?php
include_once("conexao.php");
require_once("verificaloginong.php");

$cod_ong = FILTER_INPUT(INPUT_GET, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);
$result_endereco = "SELECT * FROM endereco where cod_ong = '$cod_ong'";
$resultado_endereco = mysqli_query($conn, $result_endereco);
$row_endereco = mysqli_fetch_assoc($resultado_endereco);
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


	<title>Alterar Endereco</title>
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
			<?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			<h4 class="card-title mt-3 text-center">Alterar Endereco </h4>
			<form method="POST" action="processa_alterar_endereco_ong.php">
				<input type="hidden" name="cod_ong" value="<?php echo $_SESSION['cod_ong'] ?>">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
					</div>
					<input name="rua" class="form-control" value="<?php echo $row_endereco['rua']; ?>" placeholder="Rua" type="text" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
					</div>
					<input name="bairro" value="<?php echo $row_endereco['bairro']; ?>" class="form-control" placeholder="Bairro" type="text" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
					</div>
					<input name="numero" value="<?php echo $row_endereco['numero']; ?>" class="form-control" placeholder="Número" type="text" onkeypress="return ApenasNumeros(event,this);" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
					</div>
					<input name="cep" value="<?php echo $row_endereco['cep']; ?>" class="form-control" placeholder="CEP" type="text" onkeypress="return ApenasNumeros(event,this);" required>
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
					</div>
					<input name="cidade" value="<?php echo $row_endereco['cidade']; ?>" class="form-control" placeholder="Cidade" type="text" onkeypress="return ApenasLetras(event,this);" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block"> Alterar Endereço </button>

				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
				<script src="../jss/jquery-3.6.0.min.js"></script>
				<script src="../jss/tela.js"></script>
</body>

</html>