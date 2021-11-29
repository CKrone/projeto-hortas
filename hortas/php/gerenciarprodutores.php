<?php
include_once("conexao.php");
require_once("verificaloginadm.php");

$cod_produtor = FILTER_INPUT(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);
$result_produtor = "SELECT * FROM produtor where cod_produtor = '$cod_produtor'";
$resultado_produtor = mysqli_query($conn, $result_produtor);
$row_produtor = mysqli_fetch_assoc($resultado_produtor);

$result_endereco = "SELECT * FROM endereco where cod_produtor = '$cod_produtor'";
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

	<title>Gerenciar Produtor</title>
</head>

<body>
	<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
		<ul id="logo" class="nav">
			<a class="navbar-brand">Painel Administrador</a>
		</ul>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="telaadministrador.php">Página Administrador</a>
			</li>
		</ul>
		</ul>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="listarprodutores.php">Lista De Produtores</a>
			</li>
		</ul>
	</nav>

	<div class="card bg-light">
		<article class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-title mt-3 text-center">Editar Produtor </h4>
			<?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>

			<form method="POST" action="processa_edit_produtor.php">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<!--span class="input-group-text"> <i class="fa fa-user"></i> </span-->
					</div>
					<input name="cod_produtor" type="hidden" class="form-control" value="<?php echo $row_produtor['cod_produtor']; ?>">

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user"></i> </span>
						</div>
						<input name="nome" class="form-control" value="<?php echo $row_produtor['nome']; ?>" placeholder="Nome Completo" type="text" onkeypress="return ApenasLetras(event,this);">

					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
						</div>
						<input name="cpf" id="cpf" class="form-control" id="cpf" value="<?php echo $row_produtor['cpf']; ?>" onkeypress="return ApenasNumeros(event,this);">
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						</div>
						<input name="email" class="form-control" value="<?php echo $row_produtor['email']; ?>" placeholder="E-mail " type="email">
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						</div>
						<input name="telefone" id="telefone" class="form-control" value="<?php echo $row_produtor['telefone']; ?>" placeholder="Telefone" type="text" onkeypress="return ApenasNumeros(event,this);">
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						</div>
						<input name="celular" id="celular" class="form-control" value="<?php echo $row_produtor['celular']; ?>" placeholder="Celular" type="text" onkeypress="return ApenasNumeros(event,this);">
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block"> Editar Produtor </button>
				</div> <!-- form-group// -->
			</form>
		</article>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="../jss/jquery-3.6.0.min.js"></script>
	<script src="../jss/tela.js"></script>
	<script src="../jss/jquery-1.2.6.pack.js"></script>
    <script src="../jss/jquery.maskedinput-1.1.4.pack.js"></script>
</body>

</html>