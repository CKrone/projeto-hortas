<?php
require_once("verificaloginadm.php");
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Cristian Krone e Gabriel Langa">
	<meta name="description" content="Sistema Web para Hortas Comunitárias">
	<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="../css/header.css" rel="stylesheet" type="text/css">

	<title>Gerar Relatorio</title>
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
	<h1>Listar Pedidos</h1>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}

	$result_pedido = "SELECT * FROM pedido";
	$resultado_pedido = mysqli_query($conn, $result_pedido);
	while ($row_pedido = mysqli_fetch_assoc($resultado_pedido)) {
		$cod_pedido = $row_pedido['cod_pedido'];
		$data_entrega = $row_pedido['data_entrega'];
		echo "Código do Pedido: " . $row_pedido['cod_pedido'] . '<br>';
		echo "Data do Pedido: " . date('d/m/Y', strtotime($row_pedido['data_pedido'])) . '<br>';
		if ($data_entrega == null) {
			echo "<strong>Pedindo ainda está em aberto!</strong><br>";
		} else {
			echo "Data de Entrega: " . date('d/m/Y', strtotime($row_pedido['data_entrega'])) . '<br>';
		}
		echo "<a href='visualizarpedido.php?cod_pedido=$cod_pedido'>Visualizar Pedido</a><br><hr>";
	}


	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="../jss/jquery-3.6.0.min.js"></script>

</body>

</html>