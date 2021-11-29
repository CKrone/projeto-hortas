<?php
include("conexao.php");
session_start();

$cod_pedido = filter_input(INPUT_GET, 'cod_pedido', FILTER_SANITIZE_NUMBER_INT);


$finalizar_pedido = "UPDATE pedido SET data_entrega = NOW() WHERE cod_pedido = '$cod_pedido'";
$conecta_finalizar = mysqli_query($conn, $finalizar_pedido);


$_SESSION['msg'] = "<p style='color: green;'>Pedido Entregue e Finalizado!!</p>";
header("Location: gerarrelatorios.php?cod_produtor=$_SESSION[cod_produtor]");








