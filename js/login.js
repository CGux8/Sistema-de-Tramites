window.addEventListener("load", function(event) {
    initLogin();
  });
  
  function methodAssign(e, f, a) {
    for(let i of a) {
      i.addEventListener(e, f, false);
    }
  }
  
  function initLogin() {
    const radio = document.querySelectorAll('.radio-login-govco input');
    methodAssign("change", getOptionPerson, radio);
    
    const inputNumLogin = document.querySelectorAll('input[typeData="num"]');
    methodAssign("keyup", activeInputNumberLoguin, inputNumLogin);
  
    initDropDown();
    initInput();
  
    // desplegables del login
   /*  const selects = document.querySelectorAll('.desplegable-login-govco');
    methodAssign("click", setInputs, selects);
  } 
  
  function getOptionPerson() {
    const grandParent = this.parentNode.parentNode;
    const container = grandParent.parentNode;
    const value = this.value == '1' ? 'natural' : 'juridica';
    container.setAttribute('data-content',value);
    const option = container.querySelector('.container-login-opcion-govco[data-container-persona="' + value + '"] .desplegable-selected-option');
    const valueSelected = option.innerHTML;
    const button = container.querySelector('button.btn-govco');
    styleButtonLogin(valueSelected, button);
  }
  
  function setInputs() {
    const atribute = this.getAttribute('data-persona');
    const option = this.querySelector('.desplegable-selected-option');
    const valueSelected = option.innerHTML;
    const sibling = this.nextElementSibling;
    
    if (valueSelected != "Escoger") {
      sibling.classList.remove('none-login-govco');
      if (atribute == 'natural') {
        const dataConfig = setNaturalPerson(valueSelected);
        setInputLabel(dataConfig, sibling, valueSelected, atribute);
      } else if (atribute == 'juridica') {           
        const dataConfig = setJuridicaPerson(valueSelected);
        setInputLabel(dataConfig, sibling, valueSelected, atribute);
      }
    } else {
        sibling.classList.add('none-login-govco');
    }
  } */
  
  /* function setInputLabel(data, parent, valueSelected, atribute) {
    const label = parent.querySelector('label');
    const input = parent.querySelector('input');
    const containerParent = parent.parentNode.parentNode;
    const button = containerParent.querySelector('button.btn-govco');
    
    label.innerText = data.label;
    input.placeholder = data.placeholder;
    input.setAttribute('typeData', data.typeData);
    input.setAttribute('type', data.type);
  
    cleanInputsLoguin(parent);  
    
    if (atribute === 'juridica') {    
      const inputnum = containerParent.querySelectorAll('input[typeData="num"]');
      methodAssign("keyup", activeInputNumberLoguin, inputnum);
  
      const inputnumnit = containerParent.querySelectorAll('input[typeData="nit"]');
      methodAssign("keyup", activeInputNumberLoguinNit, inputnumnit);
  
      const inputnumnit1 = containerParent.querySelectorAll('input[typeData="nit1"]');
      methodAssign("keyup", activeInputNumberLoguinNit1, inputnumnit1);
      if (valueSelected === 'Cédula de extranjería') {
        input.removeEventListener("keyup", activeInputNumberLoguin);
      } 
   
    }else if (atribute === 'natural') {    
      const inputnum = containerParent.querySelectorAll('input[typeData="num"]');
      methodAssign("keyup", activeInputNumberLoguinNatural, inputnum);
    }
  
    if (valueSelected === 'Correo electrónico') {
      input.removeEventListener("keyup", activeInputNumberLoguinNatural);
      input.addEventListener("keyup", activeInputCorreo);
      input.setAttribute('maxlength',20);
    }  
    if (valueSelected === 'Cédula de extranjería') {
      input.removeEventListener("keyup", activeInputNumberLoguinNatural);
      input.removeEventListener("keyup", activeInputCorreo);
    } 
    styleButtonLogin(valueSelected, button);
  }
  
  function cleanInputsLoguin(parent) {
    const inputsLoguin = parent.querySelectorAll('.entradas-de-texto-govco');
    for (const element of inputsLoguin) {
      let inputs = element.querySelectorAll('input');
      for (const input of inputs) {
        input.value = '';
        input.classList.remove('error', 'success');      
      }
  
      const containerAlert = element.querySelector('.alert-entradas-de-texto-govco');
      if (containerAlert) {    
        element.removeChild(containerAlert); 
      }
    }
  }
  
  /* function styleButtonLogin(valueSelected, button) {
    if (valueSelected != "Escoger") {
      button.disabled = false;
    } else {
      button.disabled = true;
    }
  } */

    
/* 

  function setNaturalPerson(valorSeleccionado) {
    let data = {
      'label': '',
      'placeholder': '',
      'type': 'text',
      'typeData': ''
    };
  
    if (valorSeleccionado == "Correo electrónico") {  
      data = {
        'label': 'Correo electrónico*',
        'placeholder': 'Ejemplo: correo@email.com',
        'type': 'mail',
        'typeData': 'mail'
      };
    } else if (valorSeleccionado == "Cédula de ciudadanía") {
      data = {
        'label': 'Cédula de ciudadanía*',
        'placeholder': 'Ingresa tu número de identificación',
        'type': 'text',
        'typeData': 'num'
      };
    } else if (valorSeleccionado == "Cédula de extranjería") {
      data = {
        'label': 'Cédula de extranjería*',
        'placeholder': 'Ingresa tu número de identificación',
        'type': 'text',
        'typeData': 'num'
      };
    } else if (valorSeleccionado == "Tarjeta de identidad") {
      data = {
        'label': 'Tarjeta de identidad*',
        'placeholder': 'Ingresa tu número de identificación',
        'type': 'text',
        'typeData': 'num'
      };
    } else if (valorSeleccionado == "Permiso especial de permanencia") {
      data = {
        'label': 'Permiso especial de permanencia*',
        'placeholder': 'Ingresa tu número de identificación',
        'type': 'text',
        'typeData': 'num'
      };
    }
    return data;
  }
  
  function setJuridicaPerson(valorSeleccionado) {
      let data = {
        'label': '',
        'placeholder': '',
        'type': 'text',
        'typeData': ''
      };
  
      if (valorSeleccionado == "Cédula de ciudadanía") {
        data = {
          'label': 'Cédula de ciudadanía*',
          'placeholder': 'Ingresa tu número de identificación',
          'type': 'text',
          'typeData': 'num'
        };
      } else if (valorSeleccionado == "Cédula de extranjería") {
        data = {
          'label': 'Cédula de extranjería*',
          'placeholder': 'Ingresa tu número de identificación',
          'type': 'text',
          'typeData': 'num'
        };
      }
      return data;
  }
  
  function activeInputNumberLoguin(element) {
    var expresionRegularE = /^[0-9,$]*$/;
    var textExito = "Número de identificación válido";
    var textError = "Número de identificación no válido";
    let countWord = this.value.length;
  if(countWord == 0) {
    this.classList.remove('success');
    this.classList.remove('error');
  
    if(document.getElementById('campoSuccess-id'))
    {
      document.getElementById('campoSuccess-id').style.display ="none";
    }
    if( document.getElementById('campoWarning-id'))
    {
      document.getElementById('campoWarning-id').style.display ="none";
    }
  }else{
    if (expresionRegularE.test(this.value) && this.classList.contains("success") === false) {
  
        this.classList.remove('error');
        this.classList.add('success');
        crearMensaje(this, textExito, 'success', '');
  
    }else if(expresionRegularE.test(this.value) === false && this.classList.contains("error") === false) {
        if (countWord == 0){
            this.classList.remove('success');
            this.classList.remove('error');
  
            if(document.getElementById('campoSuccess-id'))
            {
              document.getElementById('campoSuccess-id').style.display ="none";
            }
            if( document.getElementById('campoWarning-id'))
            {
              document.getElementById('campoWarning-id').style.display ="none";
            }
        }
        else{
          this.classList.remove('success');
          this.classList.add('error');
          crearMensaje(this, textError, 'error', '');
        }
    }
  }
  }
  
  function activeInputNumberLoguinNit(element) {
    var expresionRegularE = /^[0-9,$]*$/;
    var textExito = "Número de NIT válido";
    var textError = "Número de NIT no válido";
    let countWord = this.value.length;
  if(countWord == 0) {
    this.classList.remove('success');
    this.classList.remove('error');
  
    if(document.getElementById('campoSuccess-idNit'))
    {
      document.getElementById('campoSuccess-idNit').style.display ="none";
    }
    if( document.getElementById('campoWarning-idNit'))
    {
      document.getElementById('campoWarning-idNit').style.display ="none";
    }
  }else{
    if (expresionRegularE.test(this.value) && this.classList.contains("success") === false) {
  
        this.classList.remove('error');
        this.classList.add('success');
        crearMensajeNit(this, textExito, 'success', '');
  
    }else if(expresionRegularE.test(this.value) === false && this.classList.contains("error") === false) {
        if (countWord == 0){
            this.classList.remove('success');
            this.classList.remove('error');
  
            if(document.getElementById('campoSuccess-idNit'))
            {
              document.getElementById('campoSuccess-idNit').style.display ="none";
            }
            if( document.getElementById('campoWarning-idNit'))
            {
              document.getElementById('campoWarning-idNit').style.display ="none";
            }
        }
        else{
          this.classList.remove('success');
          this.classList.add('error');
          crearMensajeNit(this, textError, 'error', '');
        }
    }
  }
  }
  
  function activeInputNumberLoguinNit1(element) {
    var expresionRegularE = /^[0-9,$]*$/;
    var textExito = "Num de NIT válido";
    var textError = "Num de NIT no válido";
    let countWord = this.value.length;
  if(countWord == 0) {
    this.classList.remove('success');
    this.classList.remove('error');
  
    if(document.getElementById('campoSuccess-idNit1'))
    {
      document.getElementById('campoSuccess-idNit1').style.display ="none";
    }
    if( document.getElementById('campoWarning-idNit1'))
    {
      document.getElementById('campoWarning-idNit1').style.display ="none";
    }
  }else{
    if (expresionRegularE.test(this.value) && this.classList.contains("success") === false) {
  
        this.classList.remove('error');
        this.classList.add('success');
        crearMensajeNit1(this, textExito, 'success', '');
  
    }else if(expresionRegularE.test(this.value) === false && this.classList.contains("error") === false) {
        if (countWord == 0){
            this.classList.remove('success');
            this.classList.remove('error');
  
            if(document.getElementById('campoSuccess-idNit1'))
            {
              document.getElementById('campoSuccess-idNit1').style.display ="none";
            }
            if( document.getElementById('campoWarning-idNit1'))
            {
              document.getElementById('campoWarning-idNit1').style.display ="none";
            }
        }
        else{
          this.classList.remove('success');
          this.classList.add('error');
          crearMensajeNit1(this, textError, 'error', '');
        }
    }
  }
  }
  
  function activeInputNumberLoguinNatural(element) {
    var expresionRegularE = /^[0-9,$]*$/;
    var textExito = "Número de identificación válido";
    var textError = "Número de identificación no válido";
    let countWord = this.value.length;
  if(countWord == 0) {
    this.classList.remove('success');
    this.classList.remove('error');
  
    if(document.getElementById('campoSuccess-idN'))
    {
      document.getElementById('campoSuccess-idN').style.display ="none";
    }
    if( document.getElementById('campoWarning-idN'))
    {
      document.getElementById('campoWarning-idN').style.display ="none";
    }
  }else{
    if (expresionRegularE.test(this.value) && this.classList.contains("success") === false) {
  
        this.classList.remove('error');
        this.classList.add('success');
        crearMensajeNatural(this, textExito, 'success', '');
  
    }else if(expresionRegularE.test(this.value) === false ) {
        if (countWord == 0){
            this.classList.remove('success');
            this.classList.remove('error');
  
            if(document.getElementById('campoSuccess-idN'))
            {
              document.getElementById('campoSuccess-idN').style.display ="none";
            }
            if( document.getElementById('campoWarning-idN'))
            {
              document.getElementById('campoWarning-idN').style.display ="none";
            }
        }
        else{
          this.classList.remove('success');
          this.classList.add('error');
          crearMensajeNatural(this, textError, 'error', '');
        }
    }
  }
  }
   */
  /* -------------------------------- entradas de texto --------------------------------------- */
  
  function initInput() {
    var inputDisabled = document.querySelectorAll('input[disabled]');
  
    for (let d of inputDisabled) {
      var containerDisabled = d.closest('.entradas-de-texto-govco');
      containerDisabled.classList.add('disabled-govco');
    }
  
    var inputCorreo = document.querySelectorAll('input[typeData="mail"]');
    methodAssign("keyup", activeInputCorreo, inputCorreo);
  }
  
  function activeInputCorreo(element) {
    var expresionRegularE = /^([da-z_.-]+)@([da-z.-]+).([a-z.]{2,6})$/;
    var textExito = "Correo electrónico válido";
    var textError = "Correo electrónico no válido";
    let countWord = this.value.length;
    if(countWord == 0) {
      this.classList.remove('success');
      this.classList.remove('error');
  
      if(document.getElementById('campoSuccess-id'))
      {
        document.getElementById('campoSuccess-id').style.display ="none";
      }
      if( document.getElementById('campoWarning-id'))
      {
        document.getElementById('campoWarning-id').style.display ="none";
      }
    }else{
      if (expresionRegularE.test(this.value) && this.classList.contains("success") === false) {
  
          this.classList.remove('error');
          this.classList.add('success');
          crearMensaje(this, textExito, 'success', '');
  
      }else if(expresionRegularE.test(this.value) === false && this.classList.contains("error") === false) {
          if (countWord == 0){
              this.classList.remove('success');
              this.classList.remove('error');
  
              if(document.getElementById('campoSuccess-id'))
              {
                document.getElementById('campoSuccess-id').style.display ="none";
              }
              if( document.getElementById('campoWarning-id'))
              {
                document.getElementById('campoWarning-id').style.display ="none";
              }
          }
          else{
            this.classList.remove('success');
            this.classList.add('error');
            crearMensaje(this, textError, 'error', '');
          }
      }
    }
  }
    
  function crearMensaje(e, text, type, describedby) {
    var dataMensajes = {
      'success': {
        'id': 'campoSuccess-id',
        'aria-invalid': 'false',
        'class': 'success-texto-govco',
        'role': 'status',
        'aria-live': 'polite',
      },
      'error': {
        'id': 'campoWarning-id',
        'aria-invalid': 'true',
        'class': 'error-texto-govco',
        'role': 'alert',
        'aria-live': 'assertive',
      }
    };
    var parentInput = e.closest('.entradas-de-texto-govco');
    var spanOld = parentInput.querySelector('.alert-entradas-de-texto-govco');
    if (spanOld) { parentInput.removeChild(spanOld); }
    var newSpan = document.createElement('span');
    var span = parentInput.appendChild(newSpan);
  
    e.setAttribute('aria-describedby', describedby+' '+dataMensajes[type]['id']);
    e.setAttribute('aria-invalid', dataMensajes[type]['aria-invalid']);
  
    span.textContent = text;
    span.classList.add(dataMensajes[type]['class'], 'alert-entradas-de-texto-govco');
    span.id = dataMensajes[type]['id'];
    span.setAttribute('role', dataMensajes[type]['role']);
    span.setAttribute('aria-live', dataMensajes[type]['aria-live']);
  }
  
  function crearMensajeNatural(e, text, type, describedby) {
    var dataMensajes = {
      'success': {
        'id': 'campoSuccess-idN',
        'aria-invalid': 'false',
        'class': 'success-texto-govco',
        'role': 'status',
        'aria-live': 'polite',
      },
      'error': {
        'id': 'campoWarning-idN',
        'aria-invalid': 'true',
        'class': 'error-texto-govco',
        'role': 'alert',
        'aria-live': 'assertive',
      }
    };
    var parentInput = e.closest('.entradas-de-texto-govco');
    var spanOld = parentInput.querySelector('.alert-entradas-de-texto-govco');
    if (spanOld) { parentInput.removeChild(spanOld); }
    var newSpan = document.createElement('span');
    var span = parentInput.appendChild(newSpan);
  
    e.setAttribute('aria-describedby', describedby+' '+dataMensajes[type]['id']);
    e.setAttribute('aria-invalid', dataMensajes[type]['aria-invalid']);
  
    span.textContent = text;
    span.classList.add(dataMensajes[type]['class'], 'alert-entradas-de-texto-govco');
    span.id = dataMensajes[type]['id'];
    span.setAttribute('role', dataMensajes[type]['role']);
    span.setAttribute('aria-live', dataMensajes[type]['aria-live']);
  }
  
  function crearMensajeNit(e, text, type, describedby) {
    var dataMensajes = {
      'success': {
        'id': 'campoSuccess-idNit',
        'aria-invalid': 'false',
        'class': 'success-texto-govco',
        'role': 'status',
        'aria-live': 'polite',
      },
      'error': {
        'id': 'campoWarning-idNit',
        'aria-invalid': 'true',
        'class': 'error-texto-govco',
        'role': 'alert',
        'aria-live': 'assertive',
      }
    };
    var parentInput = e.closest('.entradas-de-texto-govco');
    var spanOld = parentInput.querySelector('.alert-entradas-de-texto-govco');
    if (spanOld) { parentInput.removeChild(spanOld); }
    var newSpan = document.createElement('span');
    var span = parentInput.appendChild(newSpan);
  
    e.setAttribute('aria-describedby', describedby+' '+dataMensajes[type]['id']);
    e.setAttribute('aria-invalid', dataMensajes[type]['aria-invalid']);
  
    span.textContent = text;
    span.classList.add(dataMensajes[type]['class'], 'alert-entradas-de-texto-govco');
    span.id = dataMensajes[type]['id'];
    span.setAttribute('role', dataMensajes[type]['role']);
    span.setAttribute('aria-live', dataMensajes[type]['aria-live']);
  }
  
  function crearMensajeNit1(e, text, type, describedby) {
    var dataMensajes = {
      'success': {
        'id': 'campoSuccess-idNit1',
        'aria-invalid': 'false',
        'class': 'success-texto-govco',
        'role': 'status',
        'aria-live': 'polite',
      },
      'error': {
        'id': 'campoWarning-idNit1',
        'aria-invalid': 'true',
        'class': 'error-texto-govco',
        'role': 'alert',
        'aria-live': 'assertive',
      }
    };
    var parentInput = e.closest('.entradas-de-texto-govco');
    var spanOld = parentInput.querySelector('.alert-entradas-de-texto-govco');
    if (spanOld) { parentInput.removeChild(spanOld); }
    var newSpan = document.createElement('span');
    var span = parentInput.appendChild(newSpan);
  
    e.setAttribute('aria-describedby', describedby+' '+dataMensajes[type]['id']);
    e.setAttribute('aria-invalid', dataMensajes[type]['aria-invalid']);
  
    span.textContent = text;
    span.classList.add(dataMensajes[type]['class'], 'alert-entradas-de-texto-govco');
    span.id = dataMensajes[type]['id'];
    span.setAttribute('role', dataMensajes[type]['role']);
    span.setAttribute('aria-live', dataMensajes[type]['aria-live']);
  }
  
    /* -------------------------------- fin entradas de texto --------------------------------------- */
  }


  