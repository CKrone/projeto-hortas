<?php
include("conexao.php");
session_start();

$cod_ong = filter_input(INPUT_GET, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);
$cod_produtor = filter_input(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);

$result_pedido = "INSERT INTO pedido (data_pedido, cod_ong, cod_produtor) VALUES ( NOW(), '$cod_ong' , '$cod_produtor')";
$resultado = mysqli_query($conn, $result_pedido);

$cod_pedido = mysqli_insert_id($conn);

$produtos = "SELECT * FROM produto where cod_produtor = '$cod_produtor'";
$conecta = mysqli_query($conn, $produtos);
while ($row = mysqli_fetch_assoc($conecta)) {
    $cod_produto = $row['cod_produto'];
    $quantidade = $row['quantidade_colhida'];

    $result_itempedido = "INSERT INTO itempedido (cod_produto, cod_pedido, quantidade) VALUES ('$cod_produto', '$cod_pedido', '$quantidade')";
    $resultado_item = mysqli_query($conn, $result_itempedido);  
    
}

$zerar = "UPDATE produto SET quantidade_colhida = 0 WHERE cod_produtor = '$cod_produtor'";
$result_zerar = mysqli_query($conn, $zerar);



header( 'Location: solicitarhortalicas.php');
