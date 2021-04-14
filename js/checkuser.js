function check(){
	var user = document.getElementById('usuario').value;
	// if(user.lenght > 3)
	// 	{
			console.log(user);
			checkuser(user);
		// }else
		// 	{
		// 		$("#mensaje_longitud").html("<span class='disponible'>Usuario disponible</span>"); //mostrem missatge
		}

function checkuser(user) {
	const users = document.getElementById("usuario").value;

	$("#preloader").show(); //mostrem el gif de preloader
	return $.ajax({ //ajax
		url: "bd/checkuser.php", //l'arxiu php que valida
		data: {usuario:user}, //el nom de l'usuari
		type: "POST", //tipus d'enviament (POST)

		success: function(resposta){ //si es correcte la resposta de checkuser.php
			if (resposta == "ok"){ //si checkuser.php diu: disponible
				if(users.length > 3){
				$("#missatge").html("<span class='disponible'>Usuario disponible</span>"); //mostrem missatge
				// $("#enviar").html("<input type='submit'>"); //mostrem input d'enviament
				$("#preloader").hide(); //amaguem el preloader
			}else{ //so e checkuser.php diu: no disponible
				$("#missatge").html("<span class='no_disponible'>Usuario no disponible</span>"); //mostrem missatge
				$("#enviar").html(""); //eliminem botó d'enviament
				$("#preloader").hide(); //amaguem el preloader
			}
		}
		},
		error:function (){
		}
	});
}	