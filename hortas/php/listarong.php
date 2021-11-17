<?php
require_once("verificaloginadm.php");;
include_once("conexao.php");

//Verificar e atribuir a númeração para variável página.
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//Contar total de ongs:
$resultado_ong = "SELECT * FROM ong";
$result = mysqli_query($conn, $resultado_ong);

$total_ong = mysqli_num_rows($result);

//Quantidade de ongs por página
$quantidade_pg = 5;

//Calcular o número de páginas necessárias para apresentar.
$num_paginas = ceil($total_ong / $quantidade_pg);

//Calcular o inicio da visualização:
$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;

//Selecionar os produtores a serem exibidos
$result_ong = "SELECT * From ong limit $inicio, $quantidade_pg";
$resultado_ong = mysqli_query($conn, $result_ong);
$total_on = mysqli_num_rows($resultado_ong);

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

	<title>Editar ONG</title>
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
	<h1>Listar ONGs</h1>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	while ($row_usuario = mysqli_fetch_assoc($resultado_ong)) {
		echo "ID: " . $row_usuario['cod_ong'] . "<br>";
		echo "Nome: " . $row_usuario['razaoSocial'] . "<br>";
		echo "E-mail: " . $row_usuario['email'] . "<br>";
		echo "<a href='gerenciarong.php?cod_ong=" . $row_usuario['cod_ong'] . "'>Editar</a><br><hr>";
	}
	?>
	<?php
	//Verificar a pagina anterior e posterior
	$pagina_anterior = $pagina - 1;
	$pagina_posterior = $pagina + 1;
	?>

	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<li>
				<?php
				if ($pagina_anterior != 0) { ?>
			<li class="page-item"><a class="page-link" href="listarong.php?pagina=<?php echo $pagina_anterior; ?>">Anterior</a></li>
		<?php } else { ?>
		<?php }  ?>
		</li>
		<?php
		for ($i = 1; $i < $num_paginas + 1; $i++) { ?>
			<li class="page-item"><a class="page-link" href="listarong.php?pagina=<?php echo $i; ?>"><?php echo $i;  ?></a></li>
		<?php }
		?>
		<li>
			<?php
			if ($pagina_posterior <= $num_paginas) { ?>
		<li class="page-item"><a class="page-link" href="listarong.php?pagina=<?php echo $pagina_posterior; ?>">Próxima</a></li>
	<?php } else { ?>
	<?php }  ?>
		</ul>
	</nav>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="../jss/jquery-3.6.0.min.js"></script>
</body>

</html>