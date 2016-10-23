$(document).ready(function(){
  var dataRows=$('#tblMaterial tbody tr');
  $(dataRows).each(
    function(){
      IdItemMaterialsProd+= 1;
    }
  );
});

  // add item materials
function saveMaterialProduct(vd_table, IdItemMat, v_MetodAdd,v_MetodDel){
    var v_name=$('#txtMaterial');
    var v_nameMat=$(v_name).find(':selected').html();
    var v_quanty=$('#txtQuantityMat');
    var vd_table=$('#tblMaterial');
    var ajaxResponse=document.getElementById('ajaxResponse');

    //insert with ajax
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('input[name="_token"]').val()
      }
    });

    //add items materials
    $.post(v_MetodAdd,{
      'IdItemMaterialsProd': IdItemMat,// IdItemMaterialsProd,
      'NomItemMaterialsProd': v_nameMat,
      'QuantItemMaterialsProd': $(v_quanty).val(),
    },function(data){
      $(ajaxResponse).append('ingreso ok '+data);
      v_contenido="<tr id=ProdMat"+IdItemMat+">"+
      "<td>"+IdItemMat+"</td>"+
      "<td>"+v_nameMat+"</td>"+
      "<td>"+$(v_quanty).val()+"</td>"+
      "<td> <div class='btn-group'>"
          +"<a href='#' class='btn delete' id='deletingMat' onclick=deleteItem("+IdItemMat+",'ProdMat"+IdItemMat+"','"+v_MetodDel+"')></a>"
          +"</div> </td>"
          +"</tr>";
      $(vd_table).append(v_contenido);
      IdItemMat++; //index table of materials
    });
  }


//deleting items materials
function deleteItem(v_IdDel, v_IdDelTr,v_function){
  $.get(v_function,{
    'IdItemDel':v_IdDel
  },function(data){
    $(ajaxResponse).append('delete '+data);
    $('#'+v_IdDelTr).remove();
    alert('Deleting Success');
  });
}

function setAddRecipe(v_IdItem, v_MetodDel){
  var vd_form=$('#formRecipe');
  var v_nSpecie=$('#txtSpecie');
  var v_nColor=$('#txtColor');
  var v_nProcess=$('#txtProcess');
  var v_nType=$('#txtType');
  var v_nCut=$('#txtCut');
  var v_nGrade=$('#txtGrade');
  var v_quanty=$('#txtQuantity');
  var ajaxRecipe=document.getElementById('ajaxRecipe');

  var vd_table=document.getElementById('tblRecipe');   //nombre table

  //insert with ajax
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.post('setAddInsertRecipe',{
    'IdItemRecipeProd':v_IdItem,
    'IdSpecie':$(v_nSpecie).val(),
    'IdColor':$(v_nColor).val(),
    'IdProcess':$(v_nProcess).val(),
    'IdTypes':$(v_nType).val(),
    'IdCuts':$(v_nCut).val(),
    'IdGrade':$(v_nGrade).val(),
    'Quantity':$(v_quanty).val(),
  },function(data){
    $(ajaxRecipe).append(data);
    var v_contenido="<tr id=RecipeItem"+v_IdItem+">"+
    "<td><a href='#'>+</a></td>"+
    "<td>"+$(v_nSpecie).find(':selected').html()+"</td>"+
    "<td>"+$(v_nColor).find(':selected').html()+"</td>"+
    "<td>"+$(v_nProcess).find(':selected').html()+"</td>"+
    "<td>"+$(v_nType).find(':selected').html()+"</td>"+
    "<td>"+$(v_nCut).find(':selected').html()+"</td>"+
    "<td>"+$(v_nGrade).find(':selected').html()+"</td>"+
    "<td>"+$(v_quanty).val()+"</td>"+
    "<td> <div class='btn-group'>"
        +"<a href='' data-toggle='modal' class='btn edit' data-target='#myRegisterMaterialItems'></a>"
        +"<a href='' data-toggle='modal' class='btn delete' onclick=deleteItem("+v_IdItem+",'RecipeItem"+v_IdItem+"','"+v_MetodDel+"')></a>"
        +"</div> </td>"
        +"</tr>";
    $(vd_table).append(v_contenido);
    v_IdItem++;
  });
}
