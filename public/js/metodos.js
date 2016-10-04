
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

//Insert, edit, Taxes
function setRegistrosTaxes(v_cod, v_nam, v_cost){
  document.getElementById('txtCode').setAttribute('value',v_cod);
  document.getElementById('txtName').setAttribute('value',v_nam);
  document.getElementById('txtCost').setAttribute('value',v_cost);
}

//delete Taxes
function setRegistrosTaxesDel(v_cod, v_nam){
  document.getElementById('txtCodeDel').setAttribute('value',v_cod);
  document.getElementById('txtNameDel').setAttribute('value',v_nam);
}

//Insert, edit, Variety
function setRegistros(v_cod, v_nam){
  document.getElementById('txtCode').setAttribute('value',v_cod);
  document.getElementById('txtName').setAttribute('value',v_nam);
}

//delete Variety
function setRegistrosDel(v_cod, v_nam){
  document.getElementById('txtCodeDel').setAttribute('value',v_cod);
  document.getElementById('txtNameDel').setAttribute('value',v_nam);
}
