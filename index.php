<?php
session_start();
require_once "usuarios.php";
$us = new Usuario;


//fazendo loginpelo facebook 
require_once 'lib/Facebook/autoload.php';
$fb = new \Facebook\Facebook([
	'app_id' => '417007985810675',
	'app_secret' => 'e2b27d93257ad54b147d06e2bf0182cb',
	'default_graph_version' => 'v2.10',
	'default_access_token' => 'EAAF7RDzc3PMBAAoOIDjCooJDrL9FHhZCZAJltY0ZCnBxpgzbsZA7vDZCA387Bwj7zof050JwyFqBn9vGuHQKI7okzDfTZANbrZBJVRWVUKYL8fUeGZBT5A0Gz6e17UW8eSW5KQ9UnuimEPapHWuY6JhAk1SqsIMV1pslDW4hw2cXuwZDZD', // optional
]);

$helper = $fb->getRedirectLoginHelper();
//var_dump($helper);
$permissions = ['email']; // Optional permissions 

try {
	if (isset($_SESSION['face_access_token'])) {
		$accessToken = $_SESSION['face_access_token'];
	} else {
		$accessToken = $helper->getAccessToken();
	}
} catch (Facebook\Exceptions\FacebookResponseException $e) {
	// When Graph returns an error
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}
if (!isset($accessToken)) {
	$url_login = 'http://localhost/Ajudando-master/index.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);
} else {
	$url_login = 'http://localhost/Ajudando-master/index.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);
	//Usuario já cadastrado 
	if (isset($_SESSION['face_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);
	} //Usurario não está autenticado
	else {
		$_SESSION['face_access_token'] = (string)$accessToken;
		$oAuth2Client = $fb->getOAuth2Client();
		$_SESSION['face_access_token'] = $oAuth2Client->getLongLivedAccessToken($_SESSION['face_access_token']);
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);
	}

	try {
		// Returns a `Facebook\FacebookResponse` object
		$response = $fb->get('/me?fields=id,name,picture, email');
		$user = $response->getGraphUser();
		//var_dump ($user);

		$face_email = $user->getEmail();
		$face_name = $user->getName();
		$face_first_name = $user->getFirstName();
		if($face_first_name == ''){
			$face_first_name = $user->getName();
		}
		$face_senha = '0000';
		$face_ver = $us->cadastro($face_name, $face_senha, $face_first_name, $face_email, "99999999999", "nao", "nao", "nao informado", "facebook");
		if ($face_ver == true) {
			header("location: areaprivada.php");
		} else {
			$face_ver = $us->logar($face_email, $face_senha);
			if ($face_ver == true) {
				header("location: areaprivada.php");
			}
		}
	} catch (Facebook\Exceptions\FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch (Facebook\Exceptions\FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajudando - Login</title>
	<link rel="icon" href="images/ajudinhaicone.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/login.css">
	<meta name="google-signin-scope" content="profile email">
	<meta name="google-signin-client_id" content="285501556211-ft2mm3rp6ch3epaqcpo75dbpqb1nht8s.apps.googleusercontent.com">
</head>

<body>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

	<div class="background">
		<div class="form">
			<img src="images/ajudandotitle.png" class="ajudandotitle" />
			<h1 class="logintitle">Login</h1>
			<form role="form" class="credentials" method="POST">
				<div>
					<label for="user">E-mail:</label><br>
					<input type="email" placeholder="Digite seu e-mail" name="user" class="inputlogin-user">
					<img src="images/userlogin.png" alt="" class="image-user">
				</div>
				<div class="space-div">
					<label for="password">Senha:</label><br>
					<input type="password" placeholder="Digite sua senha" name="password" class="inputlogin-password">
					<img src="images/passwordlogin.png" alt="" class="image-password">
				</div>
				<div class="position-login">
					<input type="submit" class="btn-login" name="login" value="Entrar">
				</div>
				<div class="display-or">
					<span>OU</span>
					<div id="my-signin2" class="g-signin2" data-onsuccess="GonSignIn"></div>
					<a href="<?php echo $loginUrl ?>"><img src="images/login-fb.png" class="fb-login-button"></a>
				</div>
				<div class="cadastrar">
					<a href="cadastrar.php" class="nolink">Não tem uma conta? Cadastre-se!</a>
				</div>
				<div class="esqueci-senha">
					<a href="esqueci.php" class="nolink">Esqueci a senha</a>
				</div>
		</div>
		<?php


		if (isset($_POST['user'])) {
			$usuario = addslashes($_POST['user']);
			$senha = addslashes($_POST['password']);

			if (!empty($usuario) and !empty($senha)) {
				$verificador = $us->logar($usuario, $senha);
				if ($verificador == true) {
					header("location: areaprivada.php");
				} else {
					echo "<div class='modal-error'><span>Seu email e/ou senha estão incorretos!</span></div>";
				}
			} else {
				echo "<div class='modal-error'><span>Preencha todos os campos!</span></div>";
			}
		}

		if (isset($_SESSION['tentativa_cadastro'])) {
			$msg = $_SESSION['mensagem'];
			if ($msg !== false) {
				echo "<div class='modal-success-cadastro'><span>Usuário cadastrado com sucesso!</span></div>";
			} else {
				echo "<div class='modal-error-cadastro'><span>Usuário ja cadastrado!</span></div>";
			}
		}
		//fazendo login pelo google
		
		?>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="facebook.js"></script>
	<script type="text/javascript" src="google.js"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>