window.onload = function () {
  var formulario = document.querySelector(".form");
  var campos = formulario.elements; //obtengo todos los elementos html de mi object html pertenecientes al formulario!!
  campos = Array.from(campos);
  campos.pop();//hay que sacar el boton del submit
  const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  const regexNumbers = /^\d+$/;
  var campoFirstName = formulario.firstName;
  var campoLastName = formulario.lastName;
  var campoUserName = formulario.userName;
  var campoEmail = formulario.email;
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
      campoCountry.value.trim() === '' ||
      campoAvatar.value.trim() === ''
    ) {
        e.preventDefault();
      // alert();
      campos.forEach(function (campo) {
        var error = campo.parentElement.querySelector('.invalid-feedback');
        console.log(error);
        var nombreCampo = campo.parentElement.parentElement.querySelector('label').innerText;
        if (campo.value.trim() === '') {
          campo.classList.add('is-invalid');
          error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
        }
      });
    }
  });

  var countrySelector = document.querySelector(".selectorCountry");
  fetch("https://restcountries.eu/rest/v2/all")
    .then(response => response.json())
    .then(countries => {
      countries.forEach(country =>{
      // countrySelector.innerHTML += `<option value="${country.name}"> ${country.name} </option>`;
      //countries.indexOf(country)
      if (countrySelector.attributes.value.nodeValue.split("|")[0]===country.name) {
        countrySelector.innerHTML += `<option value="${country.name}" selected> ${country.name} </option>`;
        /**/
        var event = new Event('change');
        countrySelector.dispatchEvent(event);
      }else {
        countrySelector.innerHTML += `<option value="${country.name}"> ${country.name} </option>`;
      }
    })
  }).catch(error => console.log(error));


  // referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  countrySelector.addEventListener("change", function(){
    var countrySelect = document.querySelector(".selectorCountry").attributes.value.nodeValue.split("|")[0];
    var provinceSelect = document.querySelector(".selectorCountry").attributes.value.nodeValue.split("|")[1];
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
              // selectorProvince.innerHTML += `<option value="${province.state}"> ${province.state} </option>`;//provinces.indexOf(province)
              if (countrySelect === "Argentina" && provinceSelect === province.state) {
                  selectorProvince.innerHTML += `<option value="${province.state}" selected> ${province.state} </option>`;//provinces.indexOf(province)
              }else {
                selectorProvince.innerHTML += `<option value="${province.state}"> ${province.state} </option>`;//provinces.indexOf(province)
              }
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
