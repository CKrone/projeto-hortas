<?php
require_once("verificaloginadm.php");
include_once("conexao.php");
$cod_pedido = filter_input(INPUT_GET, 'cod_pedido', FILTER_SANITIZE_NUMBER_INT);
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
    <!--a href="listarprodutores.php">Listar</a><br-->
    <h4>Pedido <?php echo $cod_pedido ?></h4>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    $result_pedido = "SELECT * FROM pedido where cod_pedido = '$cod_pedido'";
    $resultado_pedido = mysqli_query($conn, $result_pedido);
    while ($row_pedido = mysqli_fetch_assoc($resultado_pedido)) {
        $cod_produtor = $row_pedido['cod_produtor'];
        $cod_ong = $row_pedido['cod_ong'];
    }
    echo "<h3> Produtor: </h3>";
    $result_produtores = "SELECT * FROM produtor where cod_produtor = '$cod_produtor'";
    $resultado_produtores = mysqli_query($conn, $result_produtores);
    while ($row_usuario = mysqli_fetch_assoc($resultado_produtores)) {
        echo "Nome: " . $row_usuario['nome'] . "<br>";
        echo "E-mail: " . $row_usuario['email'] . "<br>";
        echo "Telefone: " . $row_usuario['telefone'] . "<br>";
        echo "Celular: " . $row_usuario['celular'] . "<br><hr>";
    }
    echo "<h3> ONG </h3>";
    $resultado_nome = "SELECT * FROM ong where cod_ong = '$cod_ong'";
    $result = mysqli_query($conn, $resultado_nome);
    while ($row_nome = mysqli_fetch_assoc($result)) {
        //echo '<h1>Contato da ONG:</h1>' . '<br>';
        echo 'Razão Social da ONG Solicitante: ' . $row_nome['razaoSocial'] . '<br>';
        echo 'E-mail: ' . $row_nome['email'] . '<br>';
        echo 'Telefone: ' . $row_nome['telefone'] . '<br>';
        echo 'Celular: ' . $row_nome['celular'] . '<br><hr>';
    }
    echo "<h3> Hortaliças Solicitadas </h3><hr>";
    $result_itempedido = "SELECT quantidade, produto.nome, produto.data_colheita, produto.data_vencimento, produto.unidade from itempedido inner join produto on itempedido.cod_produto=produto.cod_produto where cod_produtor = '$cod_produtor' and cod_pedido = '$cod_pedido'";
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
    <script src="../jss/jquery-3.6.0.min.js"></script>
</body>

</html>