<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Ajudando - Inicio</title>
	<link rel="stylesheet" href="css/areaprivada.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="icon" href="images/ajudandoicone.ico" type="image/x-icon" />
</head>

<body>
	<div class="fundo-area">
		<div class="nav-options">
			<div class="perfil">
				<img src="images/user-image.png" alt="" class="user-image" />
				<span>Nome Social</span>
			</div>
			<div class="input-search">
				<input type="text" placeholder="Pesquise uma imagem por termo" name="user" class="search">
				<img src="images/search.png" alt="" class="search-image" />
				<img src="images/filter.png" alt="" class="filter-image" />
			</div>
		</div>
		<input type="checkbox" id="check">
		<label class="menu" for="check">
			<img src="images/menu.png" alt="" class="menu-image" />
		</label>
		<nav class="nav-menu">
			<ul>
				<li><a href="atividade.php">Atividades</a></li>
				<li><a href="aula.php">Video-Aulas</a></li>
				<li><a href="plano.php">Planos</a></li>
				<li><a href="configurar.php">Configurações</a></li>
			</ul>
		</nav>
		<div class="images">
			<div class="modal-images">
				<span>Não há imagens para a visualização.</span>
				<img src="images/sad.png" alt="" class="no-images" />
			</div>

		</div>
	</div>
</body>

</html>