

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
        //ESTO VERIFICA SI EXISTE YA UNO EN LA TABLA O HACER ESTO EN PHP IGUAL QUE CON LOS PAISES
        //PARA VER QUE NO SE REPITAN 4 VECES
        //var resume_table = document.getElementById("rwd-table-id");

        //for (var i = 0, row; row = resume_table.rows[i]; i++) {
        //  //alert(cell[i].innerText);
        //  for (var j = 0, col; col = row.cells[j]; j++) {
        //    //alert(col[j].innerText);
        //    console.log(`Txt: ${col.innerText} \tFila: ${i} \t Celda: ${j}`);
        //  }
        //}

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