<?php
//Iniciar a conexão com o banco.
include_once("conexao.php");
//Iniciar a sessão.
session_start();

//Armazenando as variáveis.

$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$cod_produtor = filter_input(INPUT_POST, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);

//Comando para alterar registros do banco.

$result_produtor = "UPDATE produtor SET senha = md5('$senha') where cod_produtor = '$cod_produtor'";

//Estabelecendo a conexão do banco com a variável de consulta.
$resultado_produtor = mysqli_query($conn, $result_produtor);

//Comando para exibir mensagens se for alterado ou não os registros do banco.
if (mysqli_affected_rows($conn)) {
	$_SESSION['msg'] = "<p style='color: green;'>Senha alterada com sucesso!</p>";
	header("Location: alterarsenhaprodutor.php");
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Senha não foi alterada! </p>";
	header("Location: alterarsenhaprodutor.php");
}
