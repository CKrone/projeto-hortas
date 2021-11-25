<?php
session_start();
include_once("conexao.php");


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$cod_adm = filter_input(INPUT_POST, 'cod_adm', FILTER_SANITIZE_STRING);

//Consulta para trazer o código pré definido na coluna cod_adm
$consulta_cod = "SELECT cod_adm FROM administrador";
$conecta_cod = mysqli_query($conn, $consulta_cod);
while ($row_cod = mysqli_fetch_assoc($conecta_cod)) {
    $cod_banco = $row_cod['cod_adm'];
}

if ($cod_adm == $cod_banco){
    $result_adm = "UPDATE administrador set email = '$email', senha = md5('$senha'),  nome = '$nome' where cod_adm = '$cod_adm'";
    $resultado_adm = mysqli_query($conn, $result_adm);

    header("Location: loginadm.php");
} else {
    $_SESSION['msg'] = "<p style='color: red;'>Código do administrador errado!!</p>";
	header("Location: cadastroAdm.php");
}