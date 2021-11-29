<?php
session_start();
include_once("conexao.php");


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST,'celular', FILTER_SANITIZE_STRING);
$cod_produtor = filter_input(INPUT_POST, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);

$result_produtor = "UPDATE produtor SET nome = '$nome', cpf = '$cpf', email = '$email', telefone = '$telefone', celular = '$celular' where cod_produtor = '$cod_produtor'";

$resultado_produtor = mysqli_query($conn, $result_produtor);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso</p>";
	header("Location: gerenciarprodutores.php?cod_produtor=$cod_produtor");
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado</p>";
	header("Location: gerenciarprodutores.php?cod_produtor=$cod_produtor");
}

