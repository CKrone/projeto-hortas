<?php
require_once("verificaloginadm.php");
include_once("conexao.php");

//Verificar e atribuir a númeração para variável página.
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//Contar total de produtores:
$resultado_prod = "SELECT * FROM produtor";
$result = mysqli_query($conn, $resultado_prod);

$total_produtores = mysqli_num_rows($result);

//Quantidade de produtores por página
$quantidade_pg = 5;

//Calcular o número de páginas necessárias para apresentar.
$num_paginas = ceil($total_produtores / $quantidade_pg);

//Calcular o inicio da visualização:
$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;

//Selecionar os produtores a serem exibidos
$result_produtores = "SELECT * From produtor limit $inicio, $quantidade_pg";
$resultado_produtores = mysqli_query($conn, $result_produtores);
$total_prod = mysqli_num_rows($resultado_produtores);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Cristian Krone e Gabriel Langa">
	<meta name="description" content="Sistema Web para Hortas Comunitárias">
	<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="../css/header.css" rel="stylesheet" type="text/css">

	<title>Editar Produtor</title>
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

	<h1>Listar Produtores</h1>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	while ($row_usuario = mysqli_fetch_assoc($resultado_produtores)) {
		echo "ID: " . $row_usuario['cod_produtor'] . "<br>";
		echo "Nome: " . $row_usuario['nome'] . "<br>";
		echo "E-mail: " . $row_usuario['email'] . "<br>";
		echo "<a href='gerenciarprodutores.php?cod_produtor=" . $row_usuario['cod_produtor'] . "'>Editar</a><br><hr>";
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
			<li class="page-item"><a class="page-link" href="listarprodutores.php?pagina=<?php echo $pagina_anterior; ?>">Anterior</a></li>
		<?php } else { ?>
		<?php }  ?>
		</li>
		<?php
		for ($i = 1; $i < $num_paginas + 1; $i++) { ?>
			<li class="page-item"><a class="page-link" href="listarprodutores.php?pagina=<?php echo $i; ?>"><?php echo $i;  ?></a></li>
		<?php }
		?>
		<li>
			<?php
			if ($pagina_posterior <= $num_paginas) { ?>
		<li class="page-item"><a class="page-link" href="listarprodutores.php?pagina=<?php echo $pagina_posterior; ?>">Próxima</a></li>
	<?php } else { ?>
	<?php }  ?>
		</ul>
	</nav>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="../jss/jquery-3.6.0.min.js"></script>
</body>

</html>