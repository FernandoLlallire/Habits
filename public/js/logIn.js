window.onload = function () {
  var formulario = document.querySelector(".formLogIn");
  var campos = formulario.elements; //obtengo todos los elementos html de mi object html pertenecientes al formulario!!
  campos = Array.from(campos);
  campos.pop();//hay que sacar el boton del submit
  const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  const regexNumbers = /^\d+$/;
  var campoEmail = formulario.email;
  var campoPassword = formulario.password;

  function validateEmptyAndEmail () {
    var error = this.parentElement.querySelector('.invalid-feedback');
    if (this.value.trim() === '') {
      this.classList.add('is-invalid');
      error.innerText = 'El campo E-mail es obligatorio';
    } else if (!regexEmail.test(this.value.trim())) {
      error.innerText = 'Escribí un formato de email valido';
    } else {
      error.innerText = '';
      this.classList.remove('is-invalid');
    }
  }

  campoPassword.addEventListener('blur', function () {
    var error = this.parentElement.querySelector('.invalid-feedback');
    if (this.value.trim() === '') {
      this.classList.add('is-invalid');
      error.innerText = 'El campo Password es obligatorio';
    } else if (this.value.trim().length < 4) {
      error.innerText = 'La contraseña debe tener más de 4 caracteres';
    } else {
      error.innerText = '';
      this.classList.remove('is-invalid');
    }
  });

  campoEmail.addEventListener('blur', validateEmptyAndEmail);

  formulario.addEventListener("submit", function(e){
    if(
      campoEmail.value.trim() === '' ||
      campoPassword.value.trim() === ''
    ) {
        e.preventDefault();
      // alert();
      campos.forEach(function (campo) {
        var error = campo.parentElement.querySelector('.invalid-feedback');
        var nombreCampo = campo.getAttribute("placeholder");
        if (campo.value.trim() === '') {
          campo.classList.add('is-invalid');
          error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
        } else if (campoPassword.value !== campoPasswordConfirmation.value) {
    			campoPasswordConfirmation.classList.add('is-invalid');
    			campoPasswordConfirmation.parentElement.querySelector('.invalid-feedback').innerText = 'Las contraseñas no coinciden';
    		}
      });
    }
  });
};
