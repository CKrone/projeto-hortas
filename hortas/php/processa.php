<?php
session_start();
include_once("conexao.php");


$cod_produtor = filter_input(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);
//Lista de variáveis 
$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input (INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input (INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);

//Conferir se já existe e-mail cadastrado 
$sql = "SELECT email from produtor where email = '$email'";
$conecta = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($conecta);

$sqlong = "SELECT email from ong where email = '$email'";
$connecta2 = mysqli_query($conn, $sqlong);
$row2 = mysqli_fetch_assoc($connecta2);

function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}
if (validaCPF($cpf) == false){
	$_SESSION['msg'] = "<p style='color: red;'>CPF Inválido!!!</p>";
	header("Location: cadastroProdutor.php");
}

if($row != 0 ){	
	$_SESSION['msg'] = "<p style='color: red;'>Usuário já existente!!!</p>";
	header("Location: cadastroProdutor.php");

} else if ($row2 != 0) {
	$_SESSION['msg'] = "<p style='color: red;'>Usuário já existente!!!</p>";
	header("Location: cadastroProdutor.php");
}
else if ($row == 0 && $row2 == 0 && validaCPF($cpf) == true) {


 //Variáveis para fazer a adição dos dados nas tabelas do banco.
	$result_produtor = "INSERT INTO produtor (nome, cpf, email, telefone, senha, celular) VALUES ('$nome', '$cpf','$email','$telefone', md5('$senha'), '$celular')";

//Conexão das variáveis com o banco de dados.
	mysqli_query($conn, $result_produtor);

	$cod_produtor = mysqli_insert_id($conn);

	$result_endereco = "INSERT INTO endereco (rua, bairro, cidade, numero, cep, cod_produtor) VALUES ('$rua', '$bairro', '$cidade', '$numero', '$cep', '$cod_produtor')";

//Conexão das variáveis com o banco de dados.
	mysqli_query($conn, $result_endereco);


//Após o cadastro, usuário é redirecionado para página de login
	header(/*"Location: ../index.html"*/
		"Location: login.php");
	
}



