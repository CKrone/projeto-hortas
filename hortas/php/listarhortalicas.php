<?php
include("conexao.php");
require_once("verificaloginong.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="author" content="Cristian Krone, Gabriel Langa e Letícia Caxoeira">
	<meta name="description" content="Sistema Web para Hortas Comunitárias">
	<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hortas Comunitárias</title>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="../jss/java.js">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<input type="hidden" name="cod_ong" value="<?php echo $_SESSION['cod_ong']; ?>">
	<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
		<ul id="logo" class="nav">
			<a class="navbar-brand">Solicitar Hortaliças </a>
		</ul>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="../index.html">Página Inicial</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="telaong.php" role="button" aria-expanded="false">Painel ONG</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="solicitarhortalicas.php" role="button" aria-expanded="false">Painel Solicitar Hortaliças</a>
			</li>
		</ul>
	</nav>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	?>
	<?php

	$cod_produtor = filter_input(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);
	$result_produto = "SELECT * FROM produto where cod_produtor = '$cod_produtor'";
	$resultado_produto = mysqli_query($conn, $result_produto);
	while ($row_produto = mysqli_fetch_assoc($resultado_produto)) {
		$quantidade = $row_produto['quantidade_colhida'];
		if ($quantidade != 0) {
			echo "Nome do produto: " . $row_produto['nome'] . "<br>";
			echo "Data de Colheita: " . date("d/m/Y", strtotime($row_produto['data_colheita'])) . "<br>";
			echo "Data de Vencimento: " . date("d/m/Y", strtotime($row_produto['data_vencimento'])) . "<br>";
			echo "Quantidade colhida: " . $row_produto['quantidade_colhida'] . "<br><hr>";
		}
	}
	echo "<a href=gerarpedido.php?cod_produtor=$cod_produtor&cod_ong=$_SESSION[cod_ong];>Solicitar Hortaliças</a><br><hr>";
	?>

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>