
  //Validacion de letras
  function soloLetras(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz"; //solo se acepta
     especiales = "8-37-39-46"; //teclas especiales
     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }

  //Validacion de Numeros
  function soloNumeros(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " 0123456789."; //solo se acepta
     especiales = "8-37-39-46"; //teclas especiales
     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }

  function limpia(idInput) {
    var val = document.getElementById(idInput).value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById(idInput).value = '';
    }
}

//Insert, edit, Taxes
function setRegistrosTaxes(v_id, v_cod, v_nam, v_cost,v_accion){
  document.getElementById('txtId').setAttribute('value',v_id);
  document.getElementById('txtCode').setAttribute('value',v_cod);
  document.getElementById('txtName').setAttribute('value',v_nam);
  document.getElementById('txtCost').setAttribute('value',v_cost);
  document.getElementById('form').setAttribute('action',v_accion);
}

//delete Taxes
function setRegistrosTaxesDel(v_id, v_cod, v_nam,v_accion){
  document.getElementById('txtIdDel').setAttribute('value',v_id);
  document.getElementById('txtCodeDel').setAttribute('value',v_cod);
  document.getElementById('txtNameDel').setAttribute('value',v_nam);
  document.getElementById('formDel').setAttribute('action',v_accion);
}

//Insert, edit, Variety
function setRegistros(v_cod, v_nam, v_accion){
  document.getElementById('txtCode').setAttribute('value',v_cod);
  document.getElementById('txtName').setAttribute('value',v_nam);
  document.getElementById('form').setAttribute('action',v_accion);
}

//delete Variety
function setRegistrosDel(v_cod, v_nam, v_accion){
  document.getElementById('txtCodeDel').setAttribute('value',v_cod);
  document.getElementById('txtNameDel').setAttribute('value',v_nam);
  document.getElementById('formDel').setAttribute('action',v_accion);
}
