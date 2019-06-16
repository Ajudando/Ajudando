<?php
session_start();
require_once "usuarios.php";
$us = new Usuario;

$email = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
$user = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
$usersocialname = filter_input(INPUT_POST, 'userfistname', FILTER_SANITIZE_STRING);
$senha = '0000';

//salvano as informações na base de dados
$verificador = $us->cadastro($user, $senha, $usersocialname, $email, '11912345678', 'nao', 'nao', 'nao informado', 'google');
if($verificador !== false){
	$_SESSION['carregar'] = true;
	$_SESSION['Guser'] = $email;
	$_SESSION['Gsenha']= $senha;
}
else{
	$verificador = $us->logar($email, $senha);
	if($verificador !== false){
		$_SESSION['carregar'] = true;
		$_SESSION['Guser'] = $email;
		$_SESSION['Gsenha']= $senha;
	}
}
?>