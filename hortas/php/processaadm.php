<?php
session_start();
include_once("conexao.php");


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$cod_adm = filter_input(INPUT_POST, 'cod_adm', FILTER_SANITIZE_STRING);


if ($cod_adm == 'ADMusuario'){
    $result_adm = "INSERT INTO administrador (email, senha, nome) values ('$email', md5('$senha'), '$nome')";
    $resultado_adm = mysqli_query($conn, $result_adm);

    header("Location: loginadm.php");
} else {
    $_SESSION['msg'] = "<p style='color: red;'>Código de verificação errado!!</p>";
	header("Location: cadastroAdm.php");
}