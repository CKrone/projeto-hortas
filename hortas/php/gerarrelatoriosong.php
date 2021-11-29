<?php
require_once("verificaloginong.php");
include_once("conexao.php");

$cod_produtor = FILTER_INPUT(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);
$cod_ong = filter_input(INPUT_GET, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);


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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="../css/header.css" rel="stylesheet" type="text/css">
 
    
    <title>Gerar Relatorio</title>
</head>

<body>
    <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
        <input type="hidden" value="<?php echo $_SESSION['cod_ong']; ?>">
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
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <?php

    $result_pedido = "SELECT * FROM pedido where cod_ong = '$cod_ong'";
    $resultado_pedido = mysqli_query($conn, $result_pedido);
    while ($row_pedido = mysqli_fetch_assoc($resultado_pedido)) {
        $cod_pedido = $row_pedido['cod_pedido'];
        echo "Número do Pedido: " . $row_pedido['cod_pedido'] . '<br>';
        //echo "Pedido: " . $row_pedido['cod_ong']. '<br>';
        echo "Data Pedido: " . date("d/m/Y", strtotime($row_pedido['data_pedido'])) . '<br>';
        if ($row_pedido['data_entrega'] == null) {
            echo "<strong>Pedido ainda em aberto!</strong><br>";
        } else {
            echo "Data Pedido Entregue " . date("d/m/Y", strtotime($row_pedido['data_entrega'])) . '<br>';
        }

        echo "<a href='listarrelatorioong.php?cod_pedido=$row_pedido[cod_pedido]'>Visualizar Relatório</a><br><hr>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../jss/tela.js" type="text/javascript"></script>
    <script src="../jss/jquery-3.6.0.min.js"></script>
</body>

</html>