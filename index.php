<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajudando - Login</title>
    <link rel="icon" href="images/ajudinhaicone.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="css/login.css">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
</head>

<body>
    <div class="background">
        <div class="form">
            <img src="images/ajudandotitle.png" class="ajudandotitle" />
            <h1 class="logintitle">Login</h1>
            <form role="form" class="credentials" method="post">
                <div>
                    <label for="user">E-mail:</label><br>
                    <input type="email" placeholder="Digite seu e-mail" name="user" class="inputlogin-user">
                </div>
                <br>
                <div>
                    <label for="password">Senha:</label><br>
                    <input type="password" placeholder="Digite sua senha" name="password" class="inputlogin-password">
                </div>
                <div class="position-login">
                    <input type="submit" class="btn-login" name="login" value="Entrar">
                </div>
                <div class="display-or">
                    <span>OU</span>
                    <div id="my-signin2"></div>
                    <div id="fb-root"></div>
                    <div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-auto-logout-link="false" data-use-continue-as="false"></div>
                </div>
                <div class="cadastrar">
                    <a href="cadastrar.php" class="nolink">Não tem uma conta? Cadastre-se!</a>
                </div>
                <div class="esqueci-senha">
                    <a href="esqueci.php" class="nolink">Esqueci a senha</a>
                </div>
        </div>
    <?php
    require_once "usuarios.php";
    $us = new Usuario;

    if (isset($_POST['user'])) {
        $usuario = addslashes($_POST['user']);
        $senha = addslashes($_POST['password']);

        if (!empty($usuario) and !empty($senha)) {
            $verificador = $us->logar($usuario, $senha);
            if ($verificador == true) {
                header("location: areaprivada.php");
            } else {
                echo "<div class='modal-error'>
                        <span>Seu email e/ou senha estão incorretos!</span>
                    </div>";
            }
        } else {
            echo "<div class='modal-error'>
                    <span>Preencha todos os campos!</span>
                </div>";
        }
    }
    ?>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script type="text/javascript" src="js/google.js"></script>
    <script type="text/javascript" src="js/facebook.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    </div>
</body>

</html>