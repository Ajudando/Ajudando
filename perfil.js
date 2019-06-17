var aparecer = 'aparecer';
var dados = {
	aparecer:aparecer
};
$.post('perfil_usu.php', dados, function(nomeretorna){
	//console.log(nomeretorna);
	document.getElementById('nome_social_usuario').innerHTML = nomeretorna;
});