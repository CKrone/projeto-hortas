<?php
require_once("verificalogin.php");
include_once("conexao.php");

$cod_produtor = FILTER_INPUT(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);
$cod_pedido = filter_input(INPUT_GET, 'cod_pedido', FILTER_SANITIZE_NUMBER_INT);

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
    <input type="hidden" id="cod_pedido" name="cod_pedido" value="<?php echo $cod_pedido ?>" >
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
        echo 'Razão Social da ONG Solicitante: ' . $row_nome['razaoSocial'] . '<br>';
        echo 'E-mail: ' . $row_nome['email'] . '<br>';
        echo 'Telefone: ' . $row_nome['telefone'] . '<br>';
        echo 'Celular: ' . $row_nome['celular'] . '<br>';
    }
    echo '<br><h3>Endereço</h3>';
    $result_endereco = "SELECT * FROM endereco where cod_ong = '$cod_ong'";
    $resultado_endereco = mysqli_query($conn, $result_endereco);
    while($row_endereco = mysqli_fetch_assoc($resultado_endereco)){
        echo 'Rua: ' . $row_endereco['rua'] . '<br>';
        echo 'Bairro: ' . $row_endereco['bairro'] . '<br>';
        echo 'Número: ' . $row_endereco['numero'] . '<br>';
        echo 'CEP: ' . $row_endereco['cep'] . '<br>';
        echo 'Cidade: ' . $row_endereco['cidade'] . '<br><hr>';
     }

    echo '<br><h4>Hortaliças Solicitadas</h4>';
    $result_itempedido = "SELECT quantidade, produto.nome, produto.data_colheita, produto.data_vencimento, produto.unidade from itempedido inner join produto on itempedido.cod_produto=produto.cod_produto where cod_produtor = '$_SESSION[cod_produtor];' and cod_pedido = '$cod_pedido_ong'";
    $resultado_item = mysqli_query($conn, $result_itempedido);
    while ($row_item = mysqli_fetch_assoc($resultado_item)) {
        if ($row_item['quantidade'] != 0) {
            echo "Nome:  " .  $row_item['nome'] . '<br>';
            echo "Data da Colheita:  " .  date('d/m/Y', strtotime($row_item['data_colheita'])) . '<br>';
            echo "Data do Vecimento:  " .  date('d/m/Y', strtotime($row_item['data_vencimento'])) . '<br>';
            echo "Quantidade: " . $row_item['quantidade'] . " " . $row_item['unidade'] . '<br><hr>';
        }
    }
    if ($data_entrega == null) {
        echo "<button type='submit' class='btn btn-primary btn-block' id='finalizar_pedido' >Finalizar Pedido </button>";
    }
    ?>
    <div class="modal fade" id="finaliza_pedido" tabindex="-1" aria-labelledby="logoutlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="finalizamodal">Pergunta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente finalizar o pedido?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="finaliza_modal_sim">Sim</button>
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