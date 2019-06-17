<?php
session_start();
if($_SESSION['social'] == "google"){
	unset($_SESSION['Guser'], $_SESSION['Gsenha'], $_SESSION['carregar']);
}
if(isset($_SESSION['tentativa_cadastro'])){
	unset($_SESSION['mensagem'], $_SESSION['tentativa_cadastro']);
}
unset($_SESSION['nome'], $_SESSION['social'], $_SESSION['login'], $_SESSION['logando'], $_SESSION['face_access_token']);
header ("location: index.php");
?>