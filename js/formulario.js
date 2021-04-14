//Función para la barra de navegación
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  };
//Tomo la id de todo el formulario
const formulario = document.getElementById('formulario');
//Para hacer un arreglo con todos los inputs
const inputs = document.querySelectorAll('#formulario input');
//Expresiones regulares, para saber lo que cada input debe tener
const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo.
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^[a-zA-Z0-9\_\-]{4,12}$/, // Letras, numeros, guion y guion_bajo.4 a 12 digitos
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,// 1ra expresion + la arroba porsupuesto + punto + dominios
}
//Al principiio todos los campos como false
const campos = {
	usuario: false,
	nombre: false,
	apellido: false,
	password: false,
	correo: false
	// telefono: false
}
//Switch y en cada caso se aplica la función para obtener los datos (e) es el evento y target al campo que se apunta
const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarUsuario(expresiones.usuario, e.target, 'usuario');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "apellido":
			validarCampo(expresiones.apellido, e.target, 'apellido');
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
			validarCorreo2();
		break;
		case "correo2":
			validarCorreo2();
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
//Para validar el usuario
function validarUsuario(expresion, input, campo){
	const user = document.getElementById("usuario").value;
	if(user.length > 3 && expresion.test(input.value)) 
		{ //mínimo 4 caracteres
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

//Para validar las contraseñas
const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

//Para validar el correo
const validarCorreo2 = () => {
	const inputCorreo1 = document.getElementById('correo');
	const inputCorreo2 = document.getElementById('correo2');

	if(inputCorreo1.value !== inputCorreo2.value){
		document.getElementById(`grupo__correo2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__correo2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__correo2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__correo2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__correo2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['correo'] = false;
	} else {
		document.getElementById(`grupo__correo2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__correo2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__correo2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__correo2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__correo2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['correo'] = true;
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

	// const terminos = document.getElementById('terminos');
	//comprobación de todos los inputs
	if(campos.usuario && campos.nombre && campos.password && campos.correo && terminos.apellido ){
		// formulario.reset();//para vaciar el formulario
		//Mensaje de envío correcto
		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 4000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {//Mensaje de error, si se envía con algun campo o todos está vacío
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 5000);
	}
});