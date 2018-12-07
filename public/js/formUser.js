window.onload = function () {
  var formulario = document.querySelector(".formCreateUser");
  var campos = formulario.elements; //obtengo todos los elementos html de mi object html pertenecientes al formulario!!
  campos = Array.from(campos);
  campos.pop();//hay que sacar el boton del submit
  const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  const regexNumbers = /^\d+$/;
  var campoFirstName = formulario.firstName;
  var campoLastName = formulario.lastName;
  var campoUserName = formulario.userName;
  var campoEmail = formulario.email;
  var campoPassword = formulario.password;
  var campoPasswordConfirmation = formulario.password_confirmation;
  var campoCountry = formulario.country;
  var campoAvatar = formulario.avatar;

  function validateEmpty () {
    var error = this.parentElement.querySelector('.invalid-feedback');
    var nombreCampo = this.parentElement.parentElement.querySelector('label').innerText;
    if (this.value.trim() === '') {
      this.classList.add('is-invalid');
      error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
    } else {
      error.innerText = '';
      this.classList.remove('is-invalid');
    }
  }

  function validateEmptyAndEmail () {
    var error = this.parentElement.querySelector('.invalid-feedback');
    var nombreCampo = this.parentElement.parentElement.querySelector('label').innerText;
    if (this.value.trim() === '') {
      this.classList.add('is-invalid');
      error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
    } else if (!regexEmail.test(this.value.trim())) {
      error.innerText = 'Escribí un formato de email valido';
    } else {
      error.innerText = '';
      this.classList.remove('is-invalid');
    }
  }

  campoPassword.addEventListener('blur', function () {
    var error = this.parentElement.querySelector('.invalid-feedback');
    var nombreCampo = this.parentElement.parentElement.querySelector('label').innerText;
    if (this.value.trim() === '') {
      this.classList.add('is-invalid');
      error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
    } else if (this.value.trim().length < 4) {
      error.innerText = 'La contraseña debe tener más de 4 caracteres';
    } else {
      error.innerText = '';
      this.classList.remove('is-invalid');
    }
  });

  campoPasswordConfirmation.addEventListener('change', function () {
    var error = this.parentElement.parentElement.querySelector('.invalid-feedback');
    if (this.value.trim() !== campoPassword.value.trim()) {
      this.classList.add('is-invalid');
      error.innerText = 'Las contraseñas no coinciden';
    } else {
      error.innerText = '';
      this.classList.remove('is-invalid');
    }
  });

  campoEmail.addEventListener('blur', validateEmptyAndEmail);
  campoFirstName.addEventListener('blur', validateEmpty);
  campoLastName.addEventListener('blur', validateEmpty);
  campoUserName.addEventListener('blur', validateEmpty);
  // console.log(campos);
  formulario.addEventListener("submit", function(e){
    if(
      campoFirstName.value.trim() === '' ||
      campoLastName.value.trim() === '' ||
      campoUserName.value.trim() === '' ||
      campoEmail.value.trim() === '' ||
      campoPassword.value.trim() === '' ||
      campoCountry.value.trim() === ''
    ) {
        e.preventDefault();
      // alert();
      campos.forEach(function (campo) {
        var error = campo.parentElement.querySelector('.invalid-feedback');
        var nombreCampo = campo.parentElement.parentElement.querySelector('label').innerText;
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

  var countrySelector = document.querySelector(".selectorCountry");
  fetch("https://restcountries.eu/rest/v2/all")
    .then(response => response.json())
    .then(countries => {
      countries.forEach(country =>{
      countrySelector.innerHTML += `<option value="${country.name}"> ${country.name} </option>`;
      //countries.indexOf(country)
      /*if (country.name==="Argentina") {
        countrySelector.innerHTML += `<option value="${country.id}" selected> ${country.name} </option>`;
      }else {
        countrySelector.innerHTML += `<option value="${country.id}"> ${country.name} </option>`;
      }*/
    })
  }).catch(error => console.log(error));


  // referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  countrySelector.addEventListener("change", function(){
    if(document.querySelector(".selectorCountry").options[document.querySelector(".selectorCountry").selectedIndex].text === "Argentina"){
      div = document.createElement("div");
      div.className = "form-group row divProvince";
      var divContent = '<label for="Province" class="col-md-4 col-form-label text-md-right">Provincia</label>';
      divContent += '<div class="col-md-6">';
      divContent += '<select id="province" type="text" class="selectorProvince form-control" name="province">';
      divContent += '</select>';
      divContent += '</div>';
      div.innerHTML = divContent;
      var countrySelector = document.querySelector(".countryDiv");
      // countrySelector.append(div);
      countrySelector.parentNode.insertBefore(div,countrySelector.nextSibling);
      var selectorProvince = document.querySelector(".selectorProvince");
      fetch("https://dev.digitalhouse.com/api/getProvincias")
        .then(response => response.json())
        .then(provinces => {
          provinces.forEach(province =>{
              selectorProvince.innerHTML += `<option value="${province.state}"> ${province.state} </option>`;//provinces.indexOf(province)
            }
          )
        })
        .catch(error => console.log(error));
    } else {
      if(document.querySelector(".divProvince")){
        document.querySelector(".divProvince").parentNode.removeChild(document.querySelector(".divProvince"));
      }
    }
  });
};
