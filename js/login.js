//Tomo la id de todo el login
const formulario = document.getElementById('formulario');
//Para hacer un arreglo con todos los inputs
const inputs = document.querySelectorAll('#formulario input');
//Expresiones regulares, para saber lo que cada input debe tener
const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo.
	password: /^[a-zA-Z0-9\_\-]{4,12}$/, // Letras, numeros, guion y guion_bajo. 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,// 1ra expresion + la arroba porsupuesto + punto + dominios
}
//Al principiio todos los campos como false
const campos = {
	usuario: false,
	correo: false,
    password: false
}
//Switch y en cada caso se aplica la función para obtener los datos, (e) es el evento y target al campo que se apunta
const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario');
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
        break;
        case "password":
			validarCampo(expresiones.password, e.target, 'password');
		break;
	}
}
//Función para validar todos los inputs
const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

//Cuando se deja de presionar una tecla y cuando se deja el campo
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});
//Cuando se le dé al submit para enviar (e) es el evento
formulario.addEventListener('submit', (e) => {
	// e.preventDefault();
	if((campos.usuario && campos.correo && campos.password) == null){
		window.location='index.php';
	//comprobación de todos los inputs
	}if(campos.usuario && campos.correo && campos.password){
		// formulario.reset();//para vaciar el formulario sólo comp Js
		//Mensaje de envío correcto
		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 4000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {//Mensaje de error, si se envía con algun campo o todos están vacíos
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 5000);
	}
});

//Para hacer aparecer y ocultar mi form de editar
function caja2() 
	{
		document.getElementById("caja2").style.visibility = "visible";
	}

function caja3() 
	{
		document.getElementById("caja3").style.visibility = "visible";
	}

function quita2() 
	{
		document.getElementById("caja2").style.visibility = "hidden";
	}

function quita3() 
	{
		document.getElementById("caja3").style.visibility = "hidden";
	}
// var clic = 1;
// function divCaja2()
// 	{ 
//    		if(clic==1)
// 			{
// 				document.getElementById("caja2").style.visibility = "visible";
// 				clic = clic + 1;
// 			}else
// 				{
// 					document.getElementById("caja2").style.visibility = "hidden";      
// 					clic = 1;
// 				}   
// 	}

// //Para hacer aparecer y ocultar el eliminar
// var click = 1;
// function divCaja3()
// 	{ 
// 		if(click==1)
// 			{
// 				document.getElementById("caja3").style.visibility = "visible";
// 				click = click + 1;
// 			}else
// 				{
// 					document.getElementById("caja3").style.visibility = "hidden";      
// 					click = 1;
// 				}   
// 		}		