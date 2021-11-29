<?php
session_start();
include("conexao.php");
	//Condição que se nada for informado nos campos permaneça na página de login.
if(empty ($_POST['email']) || empty($_POST['senha'])) {
	header('Location: loginong.php');
	exit();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

	//Consultar tabela do banco de dados para buscar os dados das variáveis.
$query = "select * from ong where email = '{$email}' and senha = md5('{$senha}')";

	//Estabelecer a conexão da variável de consultar com o banco.
$result = mysqli_query($conn, $query);

	//Lista de resultados encontrados na tabela do banco de dados.
$row = mysqli_num_rows($result);

	//Condição que aceita a entrada do usuário caso seja existente, ao contrário, volta para página de login.
while($row_usuario = mysqli_fetch_assoc($result)){
	$cod_ong = $row_usuario['cod_ong'];
	$razaoSocial = $row_usuario['razaoSocial'];
	$telefone = $row_usuario['telefone'];
	$email = $row_usuario['email'];
	$celular = $row_usuario['celular'];
}		

if($row == 1){		
	$_SESSION['email'] = $email;
	$_SESSION['cod_ong'] = $cod_ong;
	$_SESSION['razaoSocial'] = $razaoSocial;
	$_SESSION['telefone'] = $telefone;
	$_SESSION['email'] = $email;
	$_SESSION['celular'] = $celular;
	header('Location: telaong.php');
	exit();
}
else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: loginong.php');
	exit();
}


