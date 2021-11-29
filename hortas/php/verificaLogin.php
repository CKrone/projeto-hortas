<?php
session_start();

//Condição para que seja obrigatório a validação do login para acessar as páginas. 
if(!$_SESSION['email']) {
	header('Location: login.php');
	exit();
}


