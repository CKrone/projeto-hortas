<?php
require_once("verificalogin.php");

include_once("conexao.php");

$cod_produtor = FILTER_INPUT(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);
$result_produtor = "SELECT * FROM produtor where cod_produtor = '$cod_produtor'";
$resultado_produtor = mysqli_query($conn, $result_produtor);
$row_produtor = mysqli_fetch_assoc($resultado_produtor);

?>
<!DOCTYPE html>
<html>

<head>
	<!--Bootstrap 5.1 CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<!--jQuery-->
	<script src="../jss/jquery-3.6.0.min.js"></script>
	<!--Arquivos de estilo-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="../css/header.css" rel="stylesheet" type="text/css">
	<!--Bootstrap 5.1 JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="../jss/tela.js" type="text/javascript"></script>
	<title>Editar Dados</title>
</head>

<body>
	<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
		<ul id="logo" class="nav">
			<a class="navbar-brand">Painel Produtor</a>
		</ul>
		<ul id="logo" class="nav">
			<a class="navbar-brand"></a>
		</ul>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="telaProdutor.php">Página Produtor</a>
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
			<h4 class="card-title mt-3 text-center">Editar Dados </h4>
			<form method="POST" action="processa_edit_dadosprodutorr.php">
				<div class="form-group input-group">
					<input name="cod_produtor" type="hidden" class="form-control" value="<?php echo $_SESSION['cod_produtor']; ?>">
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					</div>
					<input name="email" class="form-control" value="<?php echo $row_produtor['email']; ?>" placeholder="Email " type="email" required>
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
					</div>
					<input name="telefone" class="form-control" value="<?php echo $row_produtor['telefone']; ?>" placeholder="Telefone" type="text" required>
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
					</div>
					<input name="celular" class="form-control" value="<?php echo $row_produtor['celular']; ?>" placeholder="Celular" type="text" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block"> Editar Dados </button>
				</div>
			</form>
		</article>
	</div>
</body>

</html>