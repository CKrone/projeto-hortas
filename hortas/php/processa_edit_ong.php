<?php
session_start();
include_once("conexao.php");

$razaoSocial = filter_input(INPUT_POST, 'razaoSocial', FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$cod_ong = filter_input(INPUT_POST, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);

$result_ong = "UPDATE ong SET razaoSocial = '$razaoSocial', cnpj = '$cnpj', email = '$email', telefone = '$telefone', celular = '$celular' where cod_ong = '$cod_ong'";
$resultado_ong = mysqli_query($conn, $result_ong);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso</p>";
	header("Location: listarong.php");
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado </p>";
	header("Location: gerenciarong.php?cod_ong=$cod_ong");
}




