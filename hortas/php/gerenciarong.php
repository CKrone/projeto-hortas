	<?php
	session_start();
	include_once("conexao.php");

	$cod_ong = FILTER_INPUT(INPUT_GET, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);
	$result_ong = "SELECT * FROM ong where cod_ong = '$cod_ong'";
	$resultado_ong = mysqli_query($conn, $result_ong);
	$row_ong = mysqli_fetch_assoc($resultado_ong);

	$result_endereco = "SELECT * FROM endereco where cod_ong = '$cod_ong'";
	$resultado_endereco = mysqli_query($conn, $result_endereco);
	$row_endereco = mysqli_fetch_assoc($resultado_endereco);
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
		<title>Editar ONG</title>
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
				<a class="nav-link" href="listarong.php">Lista De ONGs</a>
			</li>
		</ul>
	</nav>
	<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	?>
	
	<div class="card bg-light">
		<article class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-title mt-3 text-center">Editar ONG </h4>
			
			<form method="POST" action="processa_edit_ong.php">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<!--span class="input-group-text"> <i class="fa fa-user"></i> </span-->
					</div>
					<input  name="cod_ong" type="hidden" class="form-control" value="<?php echo $row_ong['cod_ong']; ?>">
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-user"></i> </span>
					</div>
					<input  name="razaoSocial" class="form-control" value="<?php echo $row_ong['razaoSocial']; ?>" placeholder="Nome Completo" type="text">
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
					</div>
					<input name="cnpj" class="form-control" value="<?php echo $row_ong['cnpj']; ?>">
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					</div>
					<input name="email" class="form-control" value="<?php echo $row_ong['email']; ?>" placeholder="E-mail " type="email">
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
					</div>	    
					<input name="telefone" class="form-control" value="<?php echo $row_ong['telefone']; ?>" placeholder="Telefone" type="text">
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
					</div>
					<input name="celular" class="form-control" value="<?php echo $row_ong['celular']; ?>" placeholder="Celular" type="text">
				</div> 		    
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block"> Editar ONG  </button>
				</div> <!-- form-group// -->  
			</form>
		</article>
	</div>
</body>
</html>