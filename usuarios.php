<?php

class Usuario
{		
	public function msg_notify($valor, $mostrar){
		session_start();
		$_SESSION['tentativa_cadastro'] = $mostrar;
		if($valor !== false){
			$_SESSION['mensagem'] = $valor;
		}
		else{
			$_SESSION['mensagem'] = $valor;
		}
	}
		
	public function cadastro($nome, $senha, $nome_social, $email, $celular, $contato_email, $contato_celular, $titulacao, $social)
	{
		//verificar se já existe cadastro
		$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
		//$connect = mysqli_connect("localhost:3307", "root", "usbw", "ajudando");
		$comand_sql = mysqli_query($connect ,"SELECT * FROM usuarios WHERE email = '{$email}'");
		if(mysqli_num_rows($comand_sql) == true)
		{
			return false; //já tem cadastro
		}
		else
		{
		    // caso nao, cadastrar
			$senha_codificada = md5($senha);
			$comand_sql1 = "INSERT INTO usuarios (nome, senha, nome_social, email, celular, contato_email, contato_celular, titulacao, social ) 
			VALUES ('$nome', '$senha_codificada', '$nome_social', '$email', '$celular', '$contato_email', '$contato_celular', '$titulacao', '$social')";
			mysqli_query($connect, $comand_sql1);
			mysqli_close($connect);
			return true;
		}	
	}
	
	public function logar($email, $senha)
	{
		//verificar se o email e senha estao cadastrados
		$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
		//$connect = mysqli_connect("localhost:3307", "root", "usbw", "ajudando");
		$senha_codificada = md5($senha);
		$comand_sql = mysqli_query($connect , "SELECT * FROM usuarios");
		while($result = mysqli_fetch_array($comand_sql))
		{
			$usu = $result["email"];
			$sen = $result["senha"];
			if($email == $usu and $sen == $senha_codificada)
			{
				//Entrar no sistema
				session_start();
				$_SESSION['login'] = true;
				return true; //Logado com sucesso 
				break;
			}
		}
	}

	public function esqueci($email)
	{
		$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
		//$connect = mysqli_connect("localhost:3307", "root", "usbw", "ajudando");
		$comand_sql = mysqli_query($connect ,"SELECT * FROM usuarios WHERE email = '{$email}'");

		while($result = mysqli_fetch_array($comand_sql))
		{
			$usu = $result["email"];
			if($usu == $email)
			{
				//$erro[] = "O e-mail informado não existe no banco de dados.";

				$novasenha = substr(md5(time()), 0, 6);

				$senha_codificada = md5($novasenha);

				$sql_code = mysqli_query($connect ,"UPDATE usuarios SET senha = '$senha_codificada' WHERE email = '$email'");

				return $novasenha;
				break;
			}
		}
	}
	
}

?>