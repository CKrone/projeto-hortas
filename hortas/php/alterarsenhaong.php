<?php
include_once("conexao.php");
session_start();

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
	<title>Alterar Senha</title>
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
			<h4 class="card-title mt-3 text-center">Alterar Senha </h4>
			<form method="POST" action="processa_alterar_senha_ong.php">
				<input name="cod_ong" type="hidden" value="<?php echo $_SESSION['cod_ong']; ?>">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
					<input name="senha" type="password" class="form-control" value="" required>
					<div class="input-group-prepend">
						<button type="submit" class="btn btn-primary btn-block"> Alterar Senha </button>
					</div>
				</div>
			</form>
		</article>
</body>

</html>