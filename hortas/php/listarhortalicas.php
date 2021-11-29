<?php
include("conexao.php");
require_once("verificaloginong.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="author" content="Cristian Krone e Gabriel Langa">
	<meta name="description" content="Sistema Web para Hortas Comunitárias">
	<meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listar Hortaliças</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="../css/header.css" rel="stylesheet" type="text/css">

</head>

<body>
	<input type="hidden" name="cod_ong" id="cod_ong" value="<?php echo $_SESSION['cod_ong']; ?>">
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
			echo "Quantidade colhida: " . $row_produto['quantidade_colhida'] . " " . $row_produto['unidade'] ."<br><hr>";
		}
	}
	//echo "<a href=gerarpedido.php?cod_produtor=$cod_produtor&cod_ong=$_SESSION[cod_ong];>Solicitar Hortaliças</a><br><hr>";
	echo "<button type='submit' class='btn btn-primary btn-block' id='solicitar_pedido' >Solicitar Hortaliças </button>";
	?>
	<div class="modal fade" id="solicita_modal" tabindex="-1" aria-labelledby="logoutlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="solicita_modal">Pergunta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente solicitar as hortaliças?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="solicitar_modal_sim">Sim</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../jss/tela.js" type="text/javascript"></script>
    <script src="../jss/jquery-3.6.0.min.js"></script>
    <script src="../jss/meumodal.js"></script>
</body>

</html>