	<?php

	session_start();
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
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" type="text/css" href="../css/header.css">

	</head>

	<body>
		<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
			<ul id="logo" class="nav">
				<a class="navbar-brand">Hortas Comunitárias</a>
			</ul>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link" href="../index.html">Página Inicial</a>
				</li>
			</ul>
		</nav>
		<div class="container">
			<div class="row vertical-offset-100">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Login ONG </h3>
						</div>

						<?php
						if (isset($_SESSION['nao_autenticado'])) :
						?>
							<div class="notification is-danger">
								<p>ERRO: Usuário ou senha inválidos</p>
							</div>
						<?php
						endif;
						unset($_SESSION['nao_autenticado']);
						?>
						<div class="panel-body">
							<form method="POST" action="conectaloginong.php">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="E-mail" name="email" type="text">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Senha" name="senha" type="password" value="">
									</div>
									<input class="btn btn-lg btn-success btn-block" type="submit" value="Entrar">

								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
	</body>

	</html>