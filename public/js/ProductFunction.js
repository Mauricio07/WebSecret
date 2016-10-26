$(document).ready(function(){
  var dataRows=$('#tblMaterial tbody tr');
  $(dataRows).each(
    function(){
      IdItemMaterialsProd+= 1;
    }
  );
});

  // add item materials
function saveMaterialProduct(vd_table, v_MetodAdd,v_MetodDel){
    var v_name=$('#txtMaterial');
    var v_nameMat=$(v_name).find(':selected').html();
    var v_quanty=$('#txtQuantityMat');
    //var vd_table=$('#tblMaterial');
    var ajaxRecipe=$('#ajaxResponse');

    //insert with ajax
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('input[name="_token"]').val()
      }
    });

    //add items materials
    $.post(v_MetodAdd,{
      'IdItemMaterialsProd': IdItemMaterialsProd,// IdItemMaterialsProd,
      'NomItemMaterialsProd': $(v_name).val(),
      'QuantItemMaterialsProd': $(v_quanty).val(),
    },function(data){
      //document.getElementById('ajaxResponse').setAttribute('value',data);
      $(ajaxRecipe).html(data);
      v_contenido="<tr id=ProdMat"+IdItemMaterialsProd+">"+
      "<td>"+IdItemMaterialsProd+"</td>"+
      "<td>"+v_nameMat+"</td>"+
      "<td>"+$(v_quanty).val()+"</td>"+
      "<td> <div class='btn-group'>"
          +"<a href='' class='btn delete' id='deletingMat' onclick=deleteItem("+IdItemMaterialsProd+",'ProdMat"+IdItemMaterialsProd+"','"+v_MetodDel+"')></a>"
          +"</div> </td>"
          +"</tr>";
      $(vd_table).append(v_contenido);
      IdItemMaterialsProd++; //index table of materials
    });
  }


//deleting items materials
function deleteItem(v_IdDel, v_IdDelTr,v_function){

  $.get(v_function,{
    'IdItemDel':v_IdDel
  },function(data){
    console.log(v_IdDelTr);
    //$(ajaxResponse).append('delete '+data);
    $('#'+v_IdDelTr).remove();
    alert('Deleting Success');
  });
}

function setAddRecipe(v_MetodDel){
  var vd_form=$('#formRecipe');
  var v_nSpecie=$('#txtSpecie');
  var v_nColor=$('#txtColor');
  var v_nProcess=$('#txtProcess');
  var v_nType=$('#txtType');
  var v_nCut=$('#txtCut');
  var v_nGrade=$('#txtGrade');
  var v_quanty=$('#txtQuantity');
  var v_stems=$('#txtStems');
  var v_Id_Recipe=$('#txtCodeRecipe').val();
  var ajaxRecipe=$('#ajaxRecipe');// document.getElementById('ajaxRecipe');

  //var vd_table=document.getElementById('tblRecipe');   //nombre table

  //insert with ajax
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.post('setAddInsertRecipe',{
    'Id_Recipe':v_Id_Recipe,
    'IdItemRecipeProd':IdItemRecipeProd,
    'IdSpecie':$(v_nSpecie).val(),
    'IdColor':$(v_nColor).val(),
    'IdProcess':$(v_nProcess).val(),
    'IdTypes':$(v_nType).val(),
    'IdCuts':$(v_nCut).val(),
    'IdGrade':$(v_nGrade).val(),
    'Quantity':$(v_quanty).val(),
    'Stems':$(v_stems).val(),
  },function(data){

    $(ajaxRecipe).html(data);

    IdItemRecipeProd++;
  });
}

/*
  Almacena los items en la session
*/
function saveMaterialRecipe(v_MetodAdd,v_MetodDel){
    var v_name=$('#txtMaterial');
    var v_nameMat=$(v_name).find(':selected').html();
    var v_quanty=$('#txtQuantityMatRecipe');
    var IdItemMat=$('#txtIdRow').val();
    var ajaxResponse=document.getElementById('ajaxResponse');
    //insert with ajax
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('input[name="_token"]').val()
      }
    });

    //add items materials
    $.post(v_MetodAdd,{
      'IdItemRecipe': IdItemMat,
      'IdMaterialsRecipe': $(v_name).val(),
      'NomItemMaterialsRecipe': v_nameMat,
      'QuantItemMaterialsRecipe': $(v_quanty).val(),
    },function(data){
      IdItemMat++; //index table of materials
    });
  }

/*
  Muestra el contenido de la receta
*/
function updateSession(v_idMaterialRecipe){
  var vd_table=$('#tblDatosMaterialsRecipe');
  $.get('updateSessionRoute',{
    'idItemRecipe':v_idMaterialRecipe
  },function(data){
    var contenido;
    $.each(data, function(i, item) {
      contenido+="<tr id=RecipeItemMat"+item.IdItemRecipe+"><td>"+item.NomItemMaterialsRecipe+"</td><td>"
      +item.QuantItemMaterialsRecipe+"</td><td>"+"<a href='' data-toggle='modal' class='btn delete' onclick=deleteItem("+item.IdItemRecipe
      +",'RecipeItemMat"+item.IdItemRecipe+"','setDelMaterialsRecipe')></a></td></tr>";
        //console.log(">>"+item.IdMaterialsRecipe);
    });
    $(vd_table).append(contenido);
  });
}

/*
  Limpia los controles de la receta
*/

function setLimpia(){
  var vd_form=$('#formRecipe').attr('value','');
  var v_nSpecie=$('#txtSpecie').attr('value','');
  var v_nColor=$('#txtColor').attr('value','');
  var v_nProcess=$('#txtProcess').attr('value','');
  var v_nType=$('#txtType').attr('value','');
  var v_nCut=$('#txtCut').attr('value','');
  var v_nGrade=$('#txtGrade').attr('value','');
  var v_quanty=$('#txtQuantity').attr('value','');
  var v_stems=$('#txtStems').attr('value','');
  var ajaxRecipe=$('#ajaxRecipe').html('');// document.getElementById('ajaxRecipe');
}

// add new recipes
function setInsertRecipe(v_MetodDel){
  var v_type=$('#txtPresentation');
  var ajaxRecipe=$('#ajaxResponse');
  //insert with ajax
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('input[name="_token"]').val()
    }
  });

  $.post('setAddTypeRecipe',{
    'indexRecipe': indexRecipe,
    'IndexTypeRecipe':$(v_type).val(),
    'NameTypeRecipe':$(v_type).find(':selected').html(),
  },function(data){
    $(ajaxRecipe).html(data);
    //add tabla
    v_contenido="<tr id="+indexRecipe+">"
    +"<td>"+indexRecipe+"</td>"
    +"<td><a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseItems' aria-expanded='true' aria-controls='collapseOne' onclick=getItemsRecipe("+indexRecipe+")>"+$(v_type).find(':selected').html()+"<span class='caret'></span></a></td>"
    +"<td> <div class='btn-group'>"
    +"<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegister' onclick=getIndexRowRecipe("+indexRecipe+")></a>"
    +"<a href='' data-toggle='modal' class='btn delete' onclick=deleteItem("+indexRecipe+",'Recipe"+indexRecipe+"','"+v_MetodDel+"')></a>"
    +"</div> </td></tr>";
    $('#tblRecipes').append(v_contenido);
    indexRecipe++;
  });
}

function getItemsRecipe(v_id){

  $.get('getItemsRecipe',{
    'idBusca':v_id
  },function(data){
    var v_contenido;
    $.each(data,function(i,item){
      console.log(item);
      v_contenido+="<tr id=RecipeItem"+IdItemRecipeProd+">"+
      "<td><a href='#' data-toggle='modal' data-target='#myRegisterMaterialRecipe' onclick=updateSession("+IdItemRecipeProd+")>+</a></td>"+
      "<td>"+item.SPECIE+"</td>"+
      "<td>"+item.COLOR+"</td>"+
      "<td>"+item.PROCESS+"</td>"+
      "<td>"+item.TYPE+"</td>"+
      "<td>"+item.CUTS+"</td>"+
      "<td>"+item.GRADE+"</td>"+
      "<td>"+item.QUANTITY+"</td>"+
      "<td> <div class='btn-group'>"
          +"<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegisterMaterialItems' onclick=getIdRowRecipe("+IdItemRecipeProd+")></a>"
          +"<a href='' data-toggle='modal' class='btn delete' onclick=deleteItem("+IdItemRecipeProd+",'RecipeItem"+IdItemRecipeProd+"','setDelRecipeItems')></a>"
          +"</div> </td>"
          +"</tr>";
    });
    $('#tblRecipe').html(v_contenido);
  });
}
