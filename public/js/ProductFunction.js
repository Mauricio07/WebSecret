/*
$(document).ready(function(){
  var dataRows=$('#tblMaterial tbody tr');
  $(dataRows).each(
    function(){
      -IdItemMaterialsProd+= 1;
    }
  );
});
*/

  // add item materials
function saveMaterialProduct( v_MetodAdd,v_MetodDel){
    var v_name=$('#txtMaterial');
    var v_nameMat=$(v_name).find(':selected').html();
    var v_quanty=$('#txtQuantityMat');
    var ajaxRecipe=$('#ajaxResponse');

    //insert with ajax
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('input[name="_token"]').val()
      }
    });

    //add items materials
    $.post('setAddMaterialProd',{
      'IdMaterialsProd': IdMaterialsProd,
      'NomItemMaterialsProd': $(v_name).val(),
      'QuantItemMaterialsProd': $(v_quanty).val(),
    },function(data){
      $(ajaxRecipe).html(data);
      v_contenido="<tr id=ProdMat"+IdMaterialsProd+">"+
      "<td>"+IdMaterialsProd+"</td>"+
      "<td>"+v_nameMat+"</td>"+
      "<td>"+$(v_quanty).val()+"</td>"+
      "<td> <div class='btn-group'>"
          +"<a href='' class='btn delete' id='deletingMat' onclick=deleteItem("+IdMaterialsProd+",'ProdMat"+IdMaterialsProd+"','setDeleteMaterialsProd')></a>"
          +"</div> </td>"
          +"</tr>";
      $("#tblMaterial").append(v_contenido);
      IdMaterialsProd++; //index table of materials
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
    console.log(data);
  });
}

function setAddItemRecipe(v_MetodDel){
  //insert with ajax
  var v_IndexRecipe=$('#txtCodeRecipe').val()
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.post('setAddInsertRecipe',{
    'Id_Recipe':$('#txtCodeRecipe').val(),
    'IdItemRecipeProd':IdItemRecipeProd,
    'IdSpecie':$('#txtSpecie').val(),
    'IdColor':$('#txtColor').val(),
    'IdProcess':$('#txtProcess').val(),
    'IdTypes':$('#txtType').val(),
    'IdCuts':$('#txtCut').val(),
    'IdGrade':$('#txtGrade').val(),
    'IdVariety':$('#txtVariety').val(),
    'Quantity':$('#txtQuantity').val(),
  },function(data){
    $('#ajaxRecipe').html(data);
    packsItems($('#txtQuantity').val(),v_IndexRecipe,'suma');
    IdItemRecipeProd++;
  });
}

/*
  Almacena los items en la session
*/
function saveItemMaterialRecipe(){
    var v_name=$('#txtIMaterialItem');
    var v_nameMat=$(v_name).find(':selected').html();
    var v_quanty=$('#txtQuantityMatRecipe');
    var IdItemMat=$('#txtIdRowItem').val();
    var IdItemRecipe=$('#txtIdRowRecipe').val();
    var ajaxResponse=document.getElementById('ajaxResponse');
    //insert with ajax
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('input[name="_token"]').val()
      }
    });

    //add items materials
    $.post('setAddInsertItemMaterialsRecipe',{
      'IdItemMatProd':IdItemMaterialsProd,
      'IdRecipe':$('#txtIdRowRecipe').val(),
      'IdItemRecipe': $('#txtIdRowItem').val(),
      'IdMaterialsRecipe': $(v_name).val(),
      'NomItemMaterialsRecipe': v_nameMat,
      'QuantItemMaterialsRecipe': $(v_quanty).val(),
    },function(data){
      console.log(data);
      IdItemMaterialsProd++; //index table of materials
    });
  }

/*
  Muestra el contenido de la receta
*/
function getItemsMaterials(v_indexRecipe, v_indexItem){

  $.get('getItemsMaterials_',{
    'IdRecipe':v_indexRecipe,
    'IdItemRecipe':v_indexItem
  },function(data){
    var contenido="";
    $.each(data, function(i, item) {
      contenido+="<tr id=RecipeItemMat"+item.IdItemRecipe+"><td>"
      +item.NomItemMaterialsRecipe+"</td><td>"
      +item.QuantItemMaterialsRecipe+"</td><td>"
      +"<a href='' data-toggle='modal' class='btn delete' onclick=deleteItem("
      +item.IdItemRecipe+",RecipeItemMat"+item.IdItemRecipe
      +",'setDelMaterialsRecipe')></a></td></tr>";
    });
    $('#tblItemsRecipesBody').html(contenido);
  });
}

// add new recipes
function setAddRecipe(v_MetodDel){
  //insert with ajax
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('input[name="_token"]').val()
    }
  });

  $.post('setAddTypeRecipe',{
    'indexRecipe': indexRecipe,
    'IndexTypeRecipe':$('#txtPresentation').val(),
    'NameTypeRecipe':$('#txtPresentation').find(':selected').html(),
  },function(data){
    $('#ajaxResponse').html(data);
    //add tabla
    v_contenido="<tr id="+indexRecipe+">"
    +"<td>"+indexRecipe+"</td>"
    +"<td><a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseItems' aria-expanded='true' aria-controls='collapseOne' onclick=getItemsRecipe("+indexRecipe+")>"+$('#txtPresentation').find(':selected').html()+"<span class='caret'></span></a></td>"
    +"<td id=tdPackRecipes"+indexRecipe+"> - </td>"
    +"<td> <div class='btn-group'>"
    +"<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegister' onclick=getIndexRowRecipe("+indexRecipe+")></a>"
    +"<a href='' data-toggle='modal' class='btn delete' onclick=deleteItem("+indexRecipe+",'Recipe"+indexRecipe+"','"+v_MetodDel+"')></a>"
    +"</div> </td></tr>";
    $('#tblRecipes').append(v_contenido);
    indexRecipe++;
  });
}

function getItemsRecipe(v_id){

  $.get('getItemsRecipes',{
    'idBusca':v_id
  },function(data){
    var v_contenido;
    $.each(data,function(i,item){
      $.each(item, function(j,item2){
        v_contenido+="<tr id=RecipeItem"+IdItemRecipeProd+">"+
        "<td><a href='#' data-toggle='modal' data-target='#myRegisterMaterialRecipe' onclick=getItemsMaterials("+v_id+","+item2.INDEXITEMRECIPE+")>+</a></td>"+
        "<td>"+item2.SPECIE+"</td>"+
        "<td>"+item2.TYPE+"</td>"+
        "<td>"+item2.PROCESS+"</td>"+
        "<td>"+item2.VARIETY+"</td>"+
        "<td>"+item2.COLOR+"</td>"+
        "<td>"+item2.GRADE+"</td>"+
        "<td>"+item2.CUTS+"</td>"+
        "<td>"+item2.QUANTITY+"</td>"+
        "<td> <div class='btn-group'>"
            +"<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegisterMaterialItems' onclick=getIdRowRecipe("+v_id+","+item2.INDEXITEMRECIPE+")></a>"
            +"<a href='' data-toggle='modal' class='btn delete' onclick=deleteItem("+IdItemRecipeProd+",'RecipeItem"+IdItemRecipeProd+"','setDelRecipeItems')></a>"
            +"</div> </td>"
            +"</tr>";
      });
    });
    $('#tblRecipeBody').html(v_contenido);

  });
}

function packsItems(v_valorPack, v_indexRecipe, v_op){
  var v_escribir=0;
  var bandera=false;

  $.each(packRecipe,function(i,item2){
      if (item2.index==v_indexRecipe) {
        if (v_op=="suma") {
          item2.total+=parseInt(v_valorPack);
        }else{
          item2.total-=parseInt(v_valorPack);
        }
        bandera=true;
        v_escribir=packRecipe.total;
      }
  });

  if (!bandera) {
    var a={'index':v_indexRecipe, 'total':v_valorPack};
    packRecipe.push(a);
    v_escribir=v_valorPack;
  }

  if (v_op=='suma') { //revisar suma packs
    packTotal+=parseInt(v_escribir);
    $('#txtPack').attr('value',packTotal);
    $('#tdPackRecipes'+v_indexRecipe).html(v_escribir);
  }
}
