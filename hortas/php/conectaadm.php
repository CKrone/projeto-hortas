<?php
session_start();
include("conexao.php");
	//Condição que se nada for informado nos campos permaneça na página de login.
if(empty ($_POST['email']) || empty($_POST['senha'])) {
	header('Location: loginadm.php');
	exit();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

	//Consultar tabela do banco de dados para buscar os dados das variáveis.
$query = "SELECT * FROM administrador where email = '{$email}' and senha = md5('{$senha}')";

	//Estabelecer a conexão da variável de consultar com o banco.
$result = mysqli_query($conn, $query);

	//Lista de resultados encontrados na tabela do banco de dados.
$row = mysqli_num_rows($result);

	//Condição que aceita a entrada do usuário caso seja existente, ao contrário, volta para página de login.

if($row != 0){	
	$_SESSION['email'] = $email;
	header('Location: telaadministrador.php');
	exit();
}
else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: loginadm.php');
	exit();
}


