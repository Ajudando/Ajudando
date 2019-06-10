<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajudando - Recuperar Senha</title>
    <link rel="icon" href="images/ajudinhaicone.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/esqueci.css">
</head>

<body>
    <div class="background">
        <div class="form-esqueci">
            <img src="images/ajudandotitle.png" class="ajudandotitle-cadastro" />
            <h1 class="cadastrotitle">Recuperar Senha</h1>
            <form role="form" class="form-esqueci" method="post">
                <div class="form-itens">
                    <label class="label-cadastro">E-mail:</label>
                    <input name="name" type="email" placeholder="Digite seu email" class="inputname">
                </div>
                <input type="submit" class="btn-esqueci" name="signup" value="Enviar nova senha">
			</form>

		</div>
	</div>
</body>

	<?php
	require_once "usuarios.php";
	$us = new Usuario;

	if(isset($_POST['name']))
	{
		$usuario = addslashes($_POST['name']);

		$verificador = $us->esqueci($usuario);
		
		echo "<div class='modal-success-esqueci'>
                <span>Sua nova senha é: $verificador</span>
            </div>";
	}


	?>
</html>
