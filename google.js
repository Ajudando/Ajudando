function start() {
	gapi.load('auth2', function() {
		auth2 = gapi.auth2.init({
			  client_id: '285501556211-qnu6hdcacedv67gnvsnt4u5b2cn6cpf0.apps.googleusercontent.com',
		});
	});
}

function GonSignIn(googleUser) {
	//pegando as informações do usuario
    var profile = googleUser.getBasicProfile();
	var userName = profile.getName();	
    var userEmail = profile.getEmail();
	var userfistname = profile.getGivenName();
    var id_token = googleUser.getAuthResponse().id_token;

	if(userName !== ''){
	//passando as informações
		var dados_google = {
			userName:userName,
			userfistname:userfistname,
			userEmail:userEmail
		};
		$.post('g_salvar.php', dados_google, function(retorna){
			console.log(retorna);
			if(retorna === '"erro"'){
				
			}
			else{
				window.location.href = retorna;
			}
		});
	}
	else {
		var msg = 'Usuario não encontrado!';
		//document.getElementById('comando').innerHTML = msg;
	}
}