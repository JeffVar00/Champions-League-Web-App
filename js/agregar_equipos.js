

function mayusculas() {
  const x = document.getElementById("name");
  x.value = x.value.charAt(0).toUpperCase();
}

function validarN() {
      let isValid = false;
      const input = document.forms['form']['club'];
      const message = document.getElementById('message1');

      input.willValidate = false;

      //const pattern = new RegExp(/^[A-Za-z ñ.áéíóúäëïöü\s]+$/g);

      if(!input.value) {
        isValid = false;
      } else {
        isValid = true;
      }

      if(!isValid) {
        input.style.borderColor = 'salmon';
        message.hidden = false;
      } else {
        input.style.borderColor = 'palegreen';
        message.hidden = true;
      }

      return isValid;
    }

function validarP() {

      let isValid = false;
      const input = document.forms['form']['pais'];
      const message = document.getElementById('message2');

      input.willValidate = false;

      if(input.selectedIndex == 0) {
        isValid = false;
      } else {
        isValid = true;
      }

      if(!isValid) {
        input.style.borderColor = 'salmon';
        message.hidden = false;
      } else {
        input.style.borderColor = 'palegreen';
        message.hidden = true;
      }

      return isValid;
    }

function verificar() {
      const valido = validarP();
      const valido2 = validarN();
      if (!valido || !valido2) {
        return false;
      } else {
        document.forms['form']['pais'].style.borderColor = '#000000';
        document.forms['form']['club'].style.borderColor = '#000000';
        return true;
      }
    }