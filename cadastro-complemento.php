<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Ajudando - Inicio</title>
	<link rel="stylesheet" href="css/areaprivada.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="icon" href="images/ajudandoicone.ico" type="image/x-icon" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="perfil.js"></script>
</head>

<body>
	<div class="fundo-area">
		<div class="completar-cadastro">
			<div class="modal-cadastro">
				<div class="complement-title">
					<img class="complement-image" src="images/ajudandotitle.png" />
					<span>Responda algumas perguntas para terminar o cadastro</span>
				</div>
				<div class="questions">
					<label class="space-question">Como você se considera em relação a informática de um modo geral ?</label>
					<select name="informatica" class="input-select">
						<option value="">Escolha uma das opções</option>
						<option value="">Sou um expert</option>
						<option value="">Conheço muito bem</option>
						<option value="">Sei me virar</option>
						<option value="">Sou ruim</option>
						<option value="">Sou muito ruim</option>
					</select>
					<label class="space-question">Como você se considera em relação ao uso de editores de texto ?</label>
					<select name="informatica" class="input-select">
						<option value="">Escolha uma das opções</option>
						<option value="">Sou um expert</option>
						<option value="">Conheço muito bem</option>
						<option value="">Sei me virar</option>
						<option value="">Sou ruim</option>
						<option value="">Sou muito ruim</option>
					</select>
					<label class="space-question">Como você se considera em relação a editores de apresentação ?</label>
					<select name="informatica" class="input-select">
						<option value="">Escolha uma das opções</option>
						<option value="">Sou um expert</option>
						<option value="">Uso todos os recursos</option>
						<option value="">Sei usar recursos básicos</option>
						<option value="">Não sei usar, mas me viro</option>
						<option value="">Não consigo usar de jeito nenhum</option>
					</select>
					<input type="checkbox" id="next1">
					<label for="next1" class="label-next">
						<input type="submit" class="next" name="login" value="Próximo">
					</label>
				</div>
				<div class="questions-2">
					<label class="space-question">Ao falarmos de edição de imagens e vídeos. Como você se considera ?</label>
					<select name="informatica" class="input-select">
						<option value="">Escolha uma das opções</option>
						<option value="">Sou um expert</option>
						<option value="">Conheço muito bem</option>
						<option value="">Sei me virar</option>
						<option value="">Sou ruim</option>
						<option value="">Sou muito ruim</option>
					</select>
					<label class="space-question">Quando tem alguma dificuldade no uso de recursos multimídia o que costuma fazer ?</label>
					<select name="informatica" class="input-select">
						<option value="">Escolha uma das opções</option>
						<option value="">Procuro videos na internet</option>
						<option value="">Procuto sites na internet</option>
						<option value="">Peço ajuda de outros professores</option>
						<option value="">Peço ajuda para alguem de TI</option>
						<option value="">Desisto de usar aquele recurso</option>
					</select>
					<label class="space-question">Quando precisa de atividades acadêmicas, como costuma a consegui-las ?</label>
					<select name="informatica" class="input-select">
						<option value="">Escolha uma das opções</option>
						<option value="">Elaboro todas as minhas AP</option>
						<option value="">Utilizo AP compartilhadas por outras colegas</option>
						<option value="">Busco em grupos de redes sociais que participo</option>
						<option value="">Busco em sites específicos de educação</option>
						<option value="">Procuro em buscadores (Google, Bing...)</option>
					</select>
					<input type="checkbox" id="next2">
					<label for="next2" class="label-next">
						<input type="submit" class="next" name="login" value="Próximo">
					</label>
				</div>
				<div class="questions-3">
					<label class="space-question">Como costuma a buscar imagens para elaborar suas atividades acadêmicas ?</label>
					<select name="informatica" class="input-select">
						<option value="">Escolha uma das opções</option>
						<option value="">Não elaboro atividades acadêmicas</option>
						<option value="">Busca em sites específicos de AP</option>
						<option value="">Busca em sites de busca de imagem</option>
					</select>
					<label class="space-question">E costuma manter os créditos aos autores das atividades acadêmicas ?</label>
					<select name="informatica" class="input-select">
						<option value="">Escolha uma das opções</option>
						<option value="">Sim</option>
						<option value="">Não</option>
					</select>
					<label class="space-question">O AJUDANDO disponibiliza uma série de atividades elaborados por professores e estudantes de educação. O que acha disto?</label>
					<select name="informatica" class="input-select">
						<option value="">Escolha uma das opções</option>
						<option value="">Muito legal, com certeza irei postar atividades minhas</option>
						<option value="">Interessante, devem haver muitas atividades legais</option>
						<option value="">É indiferente para mim</option>
						<option value="">Não gosto da ideia, mas respeito-a</option>
						<option value="">Não gosto da ideia</option>
					</select>
					<input type="checkbox" id="next3">
					<label for="next3" class="label-next">
						<input type="submit" class="next" name="login" value="Próximo">
					</label>
				</div>
			</div>
		</div>
		<div class="nav-options">
			<input type="checkbox" id="checkuser">
			<label class="perfil" for="checkuser" id="nome_social_usuario">
				<img src="images/user-image.png" alt="" class="user-image" />
				<p id="nome_social_usuario"></p>
			</label>
			<nav class="nav-user">
				<ul class="ul-user">
					<li><a href="conta.php">Minha conta</a></li>
					<li><a href="perfil_sair.php">Sair</a></li>
				</ul>
			</nav>
			<div class="input-search">
				<input type="text" placeholder="Pesquise uma imagem por termo" name="user" class="search">
				<img src="images/search.png" alt="" class="search-image" />
				<img src="images/filter.png" alt="" class="filter-image" />
			</div>
		</div>
		<input type="checkbox" id="checkmenu">
		<label class="menu" for="checkmenu">
			<img src="images/menu.png" alt="" class="menu-image" />
		</label>
		<nav class="nav-menu">
			<ul class="ul-menu">
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
				<?php
				session_start();
				if (isset($_SESSION['login'])) { }
				//else {
				//    header("location: index.php");
				//}
				?>
			</div>

		</div>
	</div>

</body>

</html>