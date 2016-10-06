
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

//Insert, edit, items
function setRegistrosItems(v_cod, v_nam, v_quat,v_type, v_proc, v_col, v_vari, v_spe, v_gra, v_cut, v_tax, v_accion){
  document.getElementById('txtId').setAttribute('value',v_cod);
  document.getElementById('txtName').setAttribute('value',v_nam);
  document.getElementById('txtQuant').setAttribute('value',v_quat);
  document.getElementById('txtType').setAttribute('value',v_type);
  document.getElementById('txtColor').setAttribute('value',v_col);
  document.getElementById('txtVariety').setAttribute('value',v_vari);
  document.getElementById('txtSpecie').setAttribute('value',v_spe);
  document.getElementById('txtGrade').setAttribute('value',v_gra);
  document.getElementById('txtCut').setAttribute('value',v_cut);
  document.getElementById('txtProcess').setAttribute('value',v_proc);
  document.getElementById('txtTaxe').setAttribute('value',v_tax);
  document.getElementById('form').setAttribute('action',v_accion);
}

//delete items
function setRegistrosItemsDel(v_cod, v_nam, v_accion){
  document.getElementById('txtIdDel').setAttribute('value',v_cod);
  document.getElementById('txtNameDel').setAttribute('value',v_nam);
  document.getElementById('formDel').setAttribute('action',v_accion);
}
