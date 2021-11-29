<?php
session_start();
include_once("conexao.php");

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$cod_ong = filter_input(INPUT_POST, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);

$result_ong = "UPDATE ong SET email = '$email', telefone = '$telefone', celular = '$celular' where cod_ong = '$cod_ong'";

$resultado_produtor = mysqli_query($conn, $result_ong);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso</p>";
	header("Location: editardadosong.php?cod_ong=$cod_ong");
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado </p>";
	header("Location: editardadosong.php?cod_ong=$cod_ong");
}
