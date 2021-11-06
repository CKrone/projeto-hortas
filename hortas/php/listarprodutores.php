<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
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


	<title>Editar Produtor</title>
	<meta charset="utf-8">
	
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
	</nav>
	<!--a href="listarprodutores.php">Listar</a><br-->
	<h1>Listar Produtores</h1>
	<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}	
	
	$result_produtores = "SELECT * FROM produtor";
	$resultado_produtores = mysqli_query($conn, $result_produtores);
	while($row_usuario = mysqli_fetch_assoc($resultado_produtores)){
		echo "ID: " . $row_usuario['cod_produtor'] . "<br>";
		echo "Nome: " . $row_usuario['nome'] . "<br>";
		echo "E-mail: " . $row_usuario['email'] . "<br>";
		echo "<a href='gerenciarprodutores.php?cod_produtor=" . $row_usuario['cod_produtor'] . "'>Editar</a><br><hr>";
	}			
	
	?>		
</body>
</html>