<?php
session_start();
include("conexao.php");

	//Condição que se nada for informado nos campos permaneça na página de login.
if(empty ($_POST['email']) || empty($_POST['senha'])) {
	header('Location: login.php');
	exit();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

	//Consultar tabela do banco de dados para buscar os dados das variáveis.
$query = "SELECT * FROM produtor WHERE email = '{$email}' and senha = md5('{$senha}')";

	//Estabelecer a conexão da variável de consultar com o banco.
$result = mysqli_query($conn, $query);

	//Lista de resultados encontrados na tabela do banco de dados.
$row = mysqli_num_rows($result);	

	//Transforar os dados do banco em variáveis para inserir na sessão.
while($row_usuario = mysqli_fetch_assoc($result)){
	$cod_produtor = $row_usuario['cod_produtor'];
	$nome = $row_usuario['nome'];
	$cpf = $row_usuario['cpf'];
	$email = $row_usuario['email'];
	$telefone = $row_usuario['telefone'];
}		

	//Condição que aceita a entrada do usuário caso seja existente, ao contrário, volta para página de login.
if($row == 1){
	$_SESSION['email'] = $email;	
	$_SESSION['cod_produtor'] = $cod_produtor;
	$_SESSION['nome'] = $nome;
	$_SESSION['cpf'] = $cpf;
	$_SESSION['telefone'] = $telefone;
	$_SESSION['rua'] = $rua;
	header('Location: telaProdutor.php');
	exit();
}
else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: login.php');
	exit();
}

