<?php 
include_once("conexao.php");
//Iniciar a sessão.
session_start();

//Armazenando as variáveis.
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$cod_produtor = filter_input(INPUT_POST, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);

//Comando para alterar registros do banco.
$result_produtor = "UPDATE endereco SET rua = '$rua', bairro = '$bairro', cidade = '$cidade', numero = '$numero', cep = '$cep' where cod_produtor = '$cod_produtor'";

//Estabelecendo a conexão do banco com a variável de consulta.
$resultado_ong = mysqli_query($conn, $result_produtor);

//Comando para exibir mensagens se for alterado ou não os registros do banco.
if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color: green;'>Endereço editado com sucesso</p>";
	header("Location: alterarenderecoprodutor.php?cod_produtor=$cod_produtor");
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Endereço não foi editado </p>";
	header("Location: alterarenderecoprodutor.php?cod_produtor=$cod_produtor");
}