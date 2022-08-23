const formulario = document.querySelector('.formulario');
const inputs = document.querySelectorAll('.formulario input');
const select = document.querySelector('.formulario select');

const expresiones={
	nombre: /^[a-zA-ZÀ-ÿ\s]{3,20}$/,
	a_paterno: /^[a-zA-ZÀ-ÿ\s]{3,20}$/,
	materno: /^[a-zA-ZÀ-ÿ\s]{3,20}$/,
	password: /^.{4,12}$/, 
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /(?:^\([0]?[1-9]{2}\)|^[0]?[1-9]{2}[\.-\s]?)[9]?[1-9]\d{3}[\.-\s]?\d{4}$/
}

const validarFormulario=(e)=>{
	switch (e.target.name) {
		case 'nombres':
			validarCampo(expresiones.nombre, e.target.value,'nombres');
			break;
	
		case 'a_paterno':
			validarCampo(expresiones.nombre, e.target.value,'a_paterno');	
			break;
			
		case 'a_materno':
			validarCampo(expresiones.nombre, e.target.value,'a_materno');
			break;
		case 'email':
			validarCampo(expresiones.email,e.target.value,'email');
			break;
		case 'phone':
			validarCampo(expresiones.telefono,e.target.value,'phone');
		break;
	}
}

const validarCampo=(expresion,input,campo)=>{
	if (expresion.test(input)) {
		document.getElementById(campo).classList.remove('is-invalid');
		document.getElementById(campo).classList.remove('is-valid');
	} else {
		document.getElementById(campo).classList.add('is-invalid');
	}
}

inputs.forEach((input)=>{
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur',()=> validarFormulario);
});