<?php
include_once("conexao.php");
require_once("verificaloginong.php");
//Verificar e atribuir a númeração para variável página.
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//Contar total de produtores doadores:
$result_produtores = "SELECT produtor.nome, produtor.cod_produtor FROM produtor inner join produto on produtor.cod_produtor=produto.cod_produtor where produto.quantidade_colhida > 0 GROUP BY cod_produtor";
$result = mysqli_query($conn, $result_produtores);

$total = mysqli_num_rows($result);

//Quantidade de produtores doadores  por página
$quantidade_pg = 5;

//Calcular o número de páginas necessárias para apresentar.
$num_paginas = ceil($total / $quantidade_pg);

//Calcular o inicio da visualização:
$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;

//Selecionar os produtores a serem exibidos
$result_prod = "SELECT produtor.nome, produtor.cod_produtor FROM produtor inner join produto on produtor.cod_produtor=produto.cod_produtor where produto.quantidade_colhida > 0 GROUP BY cod_produtor ORDER BY nome ASC limit $inicio, $quantidade_pg";
$resultado_produtores = mysqli_query($conn, $result_prod);
$total_produtores = mysqli_num_rows($resultado_produtores);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="author" content="Cristian Krone e Gabriel Langa">
	<meta name="description" content="Sistema Web para Hortas Comunitárias">
	<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Solicitar Hortaliças</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">	
	<link rel="stylesheet" type="text/css" href="../css/header.css">
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
	</nav>
	<?php

	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	?>
	<?php
	//$result_produtores = "SELECT produtor.nome, produtor.cod_produtor FROM produtor inner join produto on produtor.cod_produtor=produto.cod_produtor where produto.quantidade_colhida > 0 GROUP BY cod_produtor";
	//$resultado_produtores = mysqli_query($conn, $result_produtores);
	while ($row_usuario = mysqli_fetch_assoc($resultado_produtores)) {
		echo "Produtor: " . $row_usuario['nome'] . "<br>";
		echo "<a href='listarhortalicas.php?cod_produtor=" . $row_usuario['cod_produtor'] ."&cod_ong=$_SESSION[cod_ong]'>Visualizar Hortaliças</a><br><hr>";
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
			<li class="page-item"><a class="page-link" href="solicitarhortalicas.php?pagina=<?php echo $pagina_anterior; ?>">Anterior</a></li>
		<?php } else { ?>
		<?php }  ?>
		</li>
		<?php
		for ($i = 1; $i < $num_paginas + 1; $i++) { ?>
			<li class="page-item"><a class="page-link" href="solicitarhortalicas.php?pagina=<?php echo $i; ?>"><?php echo $i;  ?></a></li>
		<?php }
		?>
		<li>
			<?php
			if ($pagina_posterior <= $num_paginas) { ?>
		<li class="page-item"><a class="page-link" href="solicitarhortalicas.php?pagina=<?php echo $pagina_posterior; ?>">Próxima</a></li>
	<?php } else { ?>
	<?php }  ?>
		</ul>
	</nav>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../jss/java.js">
</body>

</html>