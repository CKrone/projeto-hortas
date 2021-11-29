<?php
//Iniciar a conexão com o banco.
include_once("conexao.php");
//Iniciar a sessão.
session_start();

//Armazenando as variáveis.
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$cod_ong = filter_input(INPUT_POST, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);

//Comando para alterar registros do banco.
$result_ong = "UPDATE ong SET senha = md5('$senha') where cod_ong = '$cod_ong'";

//Estabelecendo a conexão do banco com a variável de consulta.
$resultado_ong = mysqli_query($conn, $result_ong);

//Comando para exibir mensagens se for alterado ou não os registros do banco.
if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color: green;'>Senha alterada com sucesso</p>";
	header("Location: alterarsenhaong.php");
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Senha não foi alterada </p>";
	header("Location: alterarsenhaong.php");
}