<?php
session_start();
include_once("conexao.php");

//Lista de variáveis

$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$datacolheita = filter_input(INPUT_POST, 'datacolheita', FILTER_SANITIZE_STRING);
$datavencimento = filter_input(INPUT_POST, 'datavencimento', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
$cod_produtor = filter_input(INPUT_POST, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);
$unidade = filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_STRING);


//Comando para adicionar os campos na tabela do banco de dados
$result_produto = "INSERT INTO produto (cod_produtor, nome, data_colheita, data_vencimento, quantidade_colhida, unidade) VALUES ('$cod_produtor', '$nome', '$datacolheita','$datavencimento','$quantidade', '$unidade')";
//Variável para estabelecer conexão com o comando para adicionar no banco.
mysqli_query($conn, $result_produto);

//Mensagem para mostrar que foi adicionado as hortaliças.
if (mysqli_affected_rows($conn)) {
	$_SESSION['msg'] = "<p style='color: green;'>Hortaliças cadastradas!</p>";
	header("Location: informarHotalicas.php");
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Hortaliças não cadastradas! </p>";
	header("Location informarHotalicas.php?cod_produtor=$cod_produtor");
}


//Após o cadastro, a página é atualizada e o usuário pode registrar mais hortaliças.
header("Location: informarHortalicas.php");
