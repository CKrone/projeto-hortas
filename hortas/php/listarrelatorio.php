<?php
session_start();
include_once("conexao.php");

$cod_produtor = FILTER_INPUT(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);
$cod_pedido = filter_input(INPUT_GET, 'cod_pedido', FILTER_SANITIZE_NUMBER_INT);

?>
<!DOCTYPE html>
<html>

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
    <script src="../jss/tela.js" type="text/javascript"></script>
    <title>Editar Dados</title>
</head>

<body>
    <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
        <input type="hidden" value="<?php echo $_SESSION['cod_produtor']; ?>">
        <ul id="logo" class="nav">
            <a class="navbar-brand">Painel Produtor</a>
        </ul>
        <ul id="logo" class="nav">
            <a class="navbar-brand"></a>
        </ul>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="telaProdutor.php">Página Produtor</a>
            </li>
        </ul>
    </nav>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <h3>Contato da ONG</h3>
    <?php
    $resultado_ong = "SELECT * FROM pedido where cod_pedido='$cod_pedido'";
    $resultado = mysqli_query($conn, $resultado_ong);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $cod_ong = $row['cod_ong'];
        $cod_pedido_ong = $row['cod_pedido'];
        $data_entrega = $row['data_entrega'];
    }

    $resultado_nome = "SELECT * FROM ong where cod_ong = '$cod_ong'";
    $result = mysqli_query($conn, $resultado_nome);
    while ($row_nome = mysqli_fetch_assoc($result)) {
        //echo '<h1>Contato da ONG:</h1>' . '<br>';
        echo 'Razão Social da ONG Solicitante: ' . $row_nome['razaoSocial'] . '<br>';
        echo 'E-mail: ' . $row_nome['email'] . '<br>';
        echo 'Telefone: ' . $row_nome['telefone'] . '<br>';
        echo 'Celular: ' . $row_nome['celular'] . '<br><hr>';
    }
    echo '<br><h4>Hortaliças Solicitadas</h4>';
    $result_itempedido = "SELECT quantidade, produto.nome, produto.data_colheita, produto.data_vencimento from itempedido inner join produto on itempedido.cod_produto=produto.cod_produto where cod_produtor = '$_SESSION[cod_produtor];' and cod_pedido = '$cod_pedido_ong'";
    $resultado_item = mysqli_query($conn, $result_itempedido);
    while ($row_item = mysqli_fetch_assoc($resultado_item)) {
        if ($row_item['quantidade'] != 0) {
            echo "Nome:  " .  $row_item['nome'] . '<br>';
            echo "Data da Colheita:  " .  date('d/m/Y', strtotime($row_item['data_colheita'])) . '<br>';
            echo "Data do Vecimento:  " .  date('d/m/Y', strtotime($row_item['data_vencimento'])) . '<br>';
            echo "Quantidade: " . $row_item['quantidade'] . '<br><hr>';
        }
    }
    if ($data_entrega == null){
    echo "<a href='finalizarpedido.php?cod_pedido=$cod_pedido'>Finalizar Pedido</a><br>";
    }
    ?>
</body>

</html>