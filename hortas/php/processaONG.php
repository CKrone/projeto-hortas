<?php
session_start();
include_once("conexao.php");

$cod_ong = filter_input(INPUT_GET, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);
//Lista de variáveis.
$cnpj = filter_input (INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
$razaoSocial = filter_input (INPUT_POST, 'razaoSocial', FILTER_SANITIZE_STRING);
$telefone = filter_input (INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senhaConfirma = filter_input (INPUT_POST, 'senhaConfirma', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);

$sql = "SELECT email from ong where email = '$email'";
$conecta = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($conecta);

$sqlprodutor = "SELECT email from produtor where email = '$email'";
$connecta2 = mysqli_query($conn, $sqlprodutor);
$row2 = mysqli_fetch_assoc($connecta2);


if($row != 0){	
	$_SESSION['msg'] = "<p style='color: red;'>Usuário já existente!!!</p>";
	header("Location: cadastroONG.php");
}else if ($row2 != 0){
	$_SESSION['msg'] = "<p style='color: red;'>Usuário já existente!!!</p>";
	header("Location: cadastroONG.php");
}
else {

//Variáveis para inserção dos dados no banco.
$result_ONG = "INSERT INTO ong (cnpj, razaoSocial, telefone, email, celular, senha) VALUES ('$cnpj', '$razaoSocial', '$telefone', '$email', '$celular', md5('$senha'))";

//Conexão das variáveis com o banco de dados.
mysqli_query($conn, $result_ONG);

$cod_ong = mysqli_insert_id($conn);

$result_endereco = "INSERT INTO endereco (rua, bairro, cidade, numero, cep, cod_ong) VALUES ('$rua', '$bairro', '$cidade', '$numero', '$cep', '$cod_ong')";

//Conexão das variáveis com o banco de dados.
mysqli_query($conn, $result_endereco);

//Após o cadastro, o usuário é redirecionado para página inicial.
header("Location: ../index.html");

}