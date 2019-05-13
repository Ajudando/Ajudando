<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajudando - Cadastro</title>
    <link rel="icon" href="images/ajudinhaicone.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="background">
        <div class="form-cadastro">
            <img src="images/ajudandotitle.png" class="ajudandotitle-cadastro" />
            <h1 class="cadastrotitle">Cadastro</h1>
            <form role="form" class="corpo-form" method="post">
                <div class="form-itens">
                    <label class="label-cadastro">Nome:</label>
                    <input name="nome" type="text" placeholder="Digite seu nome completo" class="inputname">
                </div>
                <div class="form-itens">
                    <label class="label-cadastro">Senha:</label>
                    <input name="password" type="password" placeholder="Digite sua senha" class="inputname">
                </div>
                <div class="form-itens">
                    <label class="label-cadastro">Como devemos te chamar?:</label>
                    <input name="socialname" type="text" placeholder="Digite seu nome social" class="inputname">
                </div>
                <div class="form-itens">
                    <label class="label-cadastro">E-mail:</label>
                    <input name="email" type="email" placeholder="Digite seu email" class="inputname">
                </div>
                <div class="form-itens">
                    <label class="label-cadastro">Celular:</label>
                    <input name="celular" type="number" maxlength="11" placeholder="Digite seu numero de celular (COM DDD)" class="inputname">
                </div>
                <div class="form-itens">
                    <label class="checkbox-cadastro">Podemos te contatar por e-mail?
                        <span class="yes-or-no"><input type="radio" value="sim" name="checked1"> Sim OU
                            <input type="radio" value="nao" name="checked1"> Não</span>
                    </label>
                </div>
                <div class="form-itens">
                    <label class="checkbox-cadastro">Podemos te contatar por celular?
                        <span><input type="radio" value="sim" name="checked2"> Sim OU
                            <input type="radio" value="nao" name="checked2"> Não</span>
                    </label>
                </div>
                <div class="form-itens-titulacao">
                    <span>Qual a sua titulação?</span>
                    <select class="titulacao" name="titula">
                        <option value="default">Selecione sua titulação</option>
                        <option value="aluno">Aluno</option>
                        <option value="profgrad">Professor(Graduado)</option>
                        <option value="mestre">Mestre</option>
                        <option value="doutor">Doutor</option>
                        <option value="doutor">Pós Doutor</option>
                        <option value="no">Prefiro não dizer</option>
                    </select>
                </div>
                <input type="submit" class="btn-cadastro" name="signup" value="Cadastrar">
			</form>
        </div>
	</div>

</body>
<?php
	require_once "usuarios.php";
	$us = new Usuario;
	//verificar se clicou no botão entrar
	if(isset($_POST['nome']))
	{
		$nome = addslashes($_POST['nome']);
		$senha = addslashes($_POST['password']);
		$nome_social = addslashes($_POST['socialname']);
		$email = addslashes($_POST['email']);
		$celular = addslashes($_POST['celular']);
		$email_confirma = addslashes($_POST['checked1']);
		$celular_confirma = addslashes($_POST['checked2']);
		$titulacao = addslashes($_POST['titula']);

		//verificar se está campos preenchido
		if(!empty($nome) && !empty($senha) && !empty($nome_social) && !empty($email) && !empty($celular) && !empty($email_confirma) && !empty($celular_confirma) && !empty($titulacao))
		{
			if($us->cadastro($nome, $senha, $nome_social, $email, $celular, $email_confirma, $celular_confirma, $titulacao) == true)
			{
				echo "<p>usuario cadastrado com sucesso!</p>";
				echo "<a href='index.php'>ir para a pagina de login</a>";
			}
			else
			{
				echo "<p>usuario ja cadastrado!</p>";
				echo "<a href='index.php'>ir para a pagina de login</a>";
			}
		}
		else
		{
			echo "<p>preencha todos os campos!</p>";
		}
	}		
?>	
</html>