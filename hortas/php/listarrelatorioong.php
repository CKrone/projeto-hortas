<?php
require_once("verificaloginong.php");
include_once("conexao.php");

$cod_ong = filter_input(INPUT_GET, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);
$cod_produtor = FILTER_INPUT(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);
$cod_pedido = filter_input(INPUT_GET, 'cod_pedido', FILTER_SANITIZE_NUMBER_INT);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="author" content="Cristian Krone, Gabriel Langa e Letícia Caxoeira">
    <meta name="description" content="Sistema Web para Hortas Comunitárias">
    <meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="../css/header.css" rel="stylesheet" type="text/css">

    <title>Listar Relatório</title>
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

    $resultado_ong = "SELECT * FROM pedido where cod_ong='$_SESSION[cod_ong];'";
    $resultado = mysqli_query($conn, $resultado_ong);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $cod_produtor = $row['cod_produtor'];
        $cod_pedido_ong = $row['cod_pedido'];
    }
    $resultado_nome = "SELECT * FROM produtor where cod_produtor = '$cod_produtor'";
    $result = mysqli_query($conn, $resultado_nome);
    while ($row_nome = mysqli_fetch_assoc($result)) {
        echo '<h3>Contato do Produtor:</h3>' . '<br>';
        echo 'Nome do produtor: ' . $row_nome['nome'] . '<br>';
        echo 'E-mail: ' . $row_nome['email'] . '<br>';
        echo 'Telefone: ' . $row_nome['telefone'] . '<br>';
        echo 'Celular: ' . $row_nome['celular'] . '<br><hr>';
    }

    echo '<h3>Hortaliças Solicitadas</h3>';
    $result_itempedido = "SELECT quantidade, produto.nome, produto.data_colheita, produto.data_vencimento, produto.unidade from itempedido inner join produto on itempedido.cod_produto=produto.cod_produto where cod_produtor='$cod_produtor' and cod_pedido = '$cod_pedido_ong'";
    $resultado_item = mysqli_query($conn, $result_itempedido);
    while ($row_item = mysqli_fetch_assoc($resultado_item)) {
        if ($row_item['quantidade'] != 0) {
            echo "Nome:  " .  $row_item['nome'] . '<br>';
            echo "Data da Colheita:  " .  date('d/m/Y', strtotime($row_item['data_colheita'])) . '<br>';
            echo "Data do Vecimento:  " .  date('d/m/Y', strtotime($row_item['data_vencimento'])) . '<br>';
            echo "Quantidade: " . $row_item['quantidade'] . " " . $row_item['unidade'] . '<br><hr>';
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../jss/tela.js" type="text/javascript"></script>
    <script src="../jss/jquery-3.6.0.min.js"></script>
</body>

</html>