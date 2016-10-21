//var globals
var IdItemMaterialsProd=0;
var IdItemRecipeProd=0;

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
function displayTbl(v_nameTbl){
  var d_tbl=document.getElementById(v_nameTbl);
  if($(d_tbl).css('display')=='none'){
    $(d_tbl).fadeIn('slow');
  }else{
    $(d_tbl).fadeOut('slow');
  }
}


// add items table recipe
function addItemsTableRecipe(v_nameTbl){
  var vd_form=document.getElementById('formRecipe');
  var v_nSpecie=document.getElementById('txtSpecie');
  var v_nColor=document.getElementById('txtColor');
  var v_nProcess=document.getElementById('txtProcess');
  var v_nType=document.getElementById('txtType');
  var v_nCut=document.getElementById('txtCut');
  var v_nGrade=document.getElementById('txtGrade');
  var v_quanty=document.getElementById('txtQuantity');

  var vd_table=document.getElementById(v_nameTbl);   //nombre table
  var v_contenido="<tr>"+
  "<td><a href='#'>+</a></td>"+
  "<td>"+$(v_nSpecie).find(':selected').html()+"</td>"+
  "<td>"+$(v_nColor).find(':selected').html()+"</td>"+
  "<td>"+$(v_nProcess).find(':selected').html()+"</td>"+
  "<td>"+$(v_nType).find(':selected').html()+"</td>"+
  "<td>"+$(v_nCut).find(':selected').html()+"</td>"+
  "<td>"+$(v_nGrade).find(':selected').html()+"</td>"+
  "<td>"+$(v_quanty).val()+"</td>"+
  "<td> <div class='btn-group'>"
      +"<button type='button' class='btn btn-default btn-xs'>Action </button>"
      +"<button type='button' class='btn btn-default dropdown-toggle btn-xs' data-toggle='dropdown'>"
      +"<span class='caret'></span>"
      +"</button>"

      +"<ul class='dropdown-menu' role='menu'>"
      +"<li><a href='#' data-toggle='modal' data-target='#myRegisterMaterial'>Edit</a></li>"
      +"<li class='divider'></li>"
      +"<li><a href='#' data-toggle='modal' data-target='#myRegisterDel'>Delete</a></li>"
      +"</ul> </div> </td>"
      +"</tr>";
  $(vd_table).append(v_contenido);
}

function setRegistroMaterial(v_code, v_name, v_sname, v_quanty, v_accion){
    document.getElementById('txtCode').setAttribute('value',v_code);
    document.getElementById('txtName').setAttribute('value',v_name);
    document.getElementById('txtShortName').setAttribute('value',v_sname);
    document.getElementById('txtQuantity').setAttribute('value',v_quanty);
    document.getElementById('formMaterial').setAttribute('action',v_accion);
}
