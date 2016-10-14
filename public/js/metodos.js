
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
function setRegistrosItems(v_cod, v_spe, v_col, v_proc, v_type, v_cut, v_gra, v_accion){
  var opt=null;
  document.getElementById('txtId').setAttribute('value',v_cod);
  opt=document.getElementById('txtSpecie');
  $(opt).val(v_spe).change();
  opt=document.getElementById('txtColor');
  $(opt).val(v_col).change();
  opt=document.getElementById('txtProcess');
  $(opt).val(v_proc).change();
  opt=document.getElementById('txtType');
  $(opt).val(v_type).change();
  opt=document.getElementById('txtCut');
  $(opt).val(v_cut).change();
  opt=document.getElementById('txtGrade');
  $(opt).val(v_gra).change();
  document.getElementById('form').setAttribute('action',v_accion);
}

//delete Items, Specie
function setRegistrosItemsDel(v_cod, v_nam, v_accion){
  document.getElementById('txtIdDel').setAttribute('value',v_cod);
  document.getElementById('txtNameDel').setAttribute('value',v_nam);
  document.getElementById('formDel').setAttribute('action',v_accion);
}

//Insert, edit, Specie
function setRegistroSpecie(v_cod, v_nam, v_var, v_tax, v_accion){
  var option;
  document.getElementById('txtCode').setAttribute('value',v_cod);
  document.getElementById('txtName').setAttribute('value',v_nam);
  option=document.getElementById('txtVariety');
  $(option).val(v_var).change();
  option=document.getElementById('txtTaxe')
  $(option).val(v_tax).change();
  document.getElementById('form').setAttribute('action',v_accion);
}

//limit to rows in table
function limitRowsTbl(v_nameTbl){
  var maxRows=10;
  var table=document.getElementById(v_nameTbl);
  var rows=$(table).find('tbody tr');
  rows.hide().slice(0,7).show();

}

//display table products
function displayTbl(nameTbl){
  var d_tbl=document.getElementById(nameTbl);
  if($(d_tbl).css('display')=='none'){
    $(d_tbl).fadeIn('slow');
  }else{
    $(d_tbl).fadeOut('slow');
  }
}
