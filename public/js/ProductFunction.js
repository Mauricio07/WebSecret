
  // add item materials
function saveMaterialProduct(){
    var v_idMaterials=$('#txtMaterial');
    var v_nameMat=$('#txtMaterial').find(':selected').html();
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
      //'IdMaterialsProd': IdMaterialsProd,
      'IdMaterialsProd': $(v_idMaterials).val(),
      'NomMaterialsProd': v_nameMat,
      'QuantMaterialsProd': $(v_quanty).val(),
    },function(dataMaterials){
      console.log(dataMaterials.length);
      if (dataMaterials.length) {
        $(ajaxRecipe).html(dataMaterials);
        getDataMaterials();
      }
    });
  }

//deleting items materials
/*
*
* v_IdDel     indice a eliminar
* v_IdDelTr   id item remover
* v_function  funcion a ejecutar
*
*/
function deleteItem(v_IdDel, v_IdDelTr,v_function, v_indexRecipe){
  $.get(v_function,{
    'IdItemDel':v_IdDel
  },function(data){
    $('#'+v_IdDelTr).remove();
    menssageUser('Deletion successful');

    //sumar items recetas
    var v_total=0;
    $('#tblRecipeBody tr').find('td:eq(8)').each(function(){
      v_total+=parseInt($(this).html());
    });

    $('#tdPackRecipes'+v_indexRecipe).html(v_total); //actualiza cabecera de recetas
    //suma las recetas
    UpdateQuantityRecipe();

  });
}

function setAddItemRecipe(v_MetodDel){
  //insert with ajax
  var v_IndexRecipe=$('#txtCodeRecipe').val();
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.post('setAddItemRecipe',{
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
    getDataItemRecipe(0,v_IndexRecipe);
    packsItems($('#txtQuantity').val(),v_IndexRecipe);
    IdItemRecipeProd++;
  });
}
/*
  Almacena los items en la session
*/
function saveMaterialRecipe(){
    var v_name=$('#txtIMaterialItem');
    var v_nameMat=$(v_name).find(':selected').html();
    var v_quanty=$('#txtQuantityMatRecipe');
    var IdItemRecipe=$('#txtIdRowRecipe').val();
    //insert with ajax
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('input[name="_token"]').val()
      }
    });

    //add items materials
    $.post('setAddInsertMaterialsRecipe',{
      'IdRecipe':$('#txtIdRowRecipe').val(),
      'IdMaterialsRecipe': $(v_name).val(),
      'NomItemMaterialsRecipe': v_nameMat,
      'QuantItemMaterialsRecipe': $(v_quanty).val(),
    },function(data){
      console.log(data);
      IdItemMaterialsProd++; //index table of materials
      $('#imgSearch'+IdItemRecipe).removeClass('imgConsultar');
      $('#imgSearch'+IdItemRecipe).addClass('imgConsultar-after');
    });
  }

/*
  Muestra el contenido de los materiales de la receta

function getItemsMaterials(v_indexRecipe, v_indexItem){
console.log("-->"+v_indexRecipe);
  $.get('getItemsMaterials_',{
    'IdRecipe':v_indexRecipe,
    'IdItemRecipe':v_indexItem,
  },function(data){
    var contenido="";
    $.each(data, function(i, item) {
      contenido+="<tr id=RecipeItemMat"+item.IdItemRecipe+"><td>"
      +item.NomItemMaterialsRecipe+"</td><td>"
      +item.QuantItemMaterialsRecipe+"</td><td>"
      +"<button type='button' data-dismiss='modal' arial-lavel='Close' class='btn delete' onclick=getDeleteItemsMaterials("+item.IdItemMatProd+")></button></td></tr>";
    });
    $('#tblItemsRecipesBody').html(contenido);
  });
}
*/

function getDeleteItemsMaterials(v_indexItemMaterialDel){
  $.get('setDelItemsMaterialsRecipe',{
    'IdItemDel':v_indexItemMaterialDel
  },function(data){
    menssageUser(data);
  });
}

// add new recipes
function setAddRecipe(){
  //insert with ajax
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('input[name="_token"]').val()
    }
  });

  $.post('setAddTypeRecipe',{
    //'IndexRecipe': indexRecipe,
    'IndexTypeRecipe':$('#txtPresentation').val(),
    'NameTypeRecipe':$('#txtPresentation').find(':selected').html(),
  },function(dataRecipe){
    $('#ajaxRecipe').html(dataRecipe);
    getDataRecipes();
  });
}

function getItemsRecipe(v_id){

  console.log(v_id);
  $.get('getItemsRecipes',{
    'idBusca':v_id
  },function(data){
    //console.log(data);
    var v_contenido;
    $.each(data,function(i,item){
      $.each(item, function(j,item2){
        v_contenido+="<tr id=RecipeItem"+item2.INDEXITEMRECIPE+">"+
        "<td><a href='#' data-toggle='modal' data-target='#myRegisterMaterialRecipe' onclick=getItemsMaterials("+v_id+","+item2.INDEXITEMRECIPE+")>+</a></td>"+
        "<td>"+item2.SPECIE+"</td>"+
        "<td>"+item2.TYPE+"</td>"+
        "<td>"+item2.PROCESS+"</td>"+
        "<td>"+item2.VARIETY+"</td>"+
        "<td>"+item2.COLOR+"</td>"+
        "<td>"+item2.GRADE+"</td>"+
        "<td>"+item2.CUTS+"</td>"+
        "<td>"+item2.QUANTITY+"</td>"+
        "<td> <div class='btn-group'><a data-toggle='modal' class='btn delete' onclick=deleteItem("+item2.INDEXITEMRECIPE+",'RecipeItem"+item2.INDEXITEMRECIPE+"','setDelRecipeItems',"+v_id+
            ")></a></div> </td></tr>";
      });
    });
    $('#tblRecipeBody').html(v_contenido);
  });
}

function packsItems(v_valorPack, v_indexRecipe){
  var bandera=false;
  var v_Total=0;
  $.each(packRecipe,function(i,item){
    //console.log(item.index +' - '+ item.total);
    if (item.index==v_indexRecipe) {
      item.total=parseInt(item.total)+parseInt(v_valorPack);
      v_Total=item.total;
      bandera=true;
    }
  });

  if (!bandera) {
    var a={'index':v_indexRecipe, 'total':v_valorPack};
    packRecipe.push(a);
    v_Total=v_valorPack;
  }

   //revisar suma packs
    $('#tdPackRecipes'+v_indexRecipe).html(v_Total);
    //sumar totales recetas
    UpdateQuantityRecipe();
}

function UpdateQuantityRecipe(){
  var v_Total=0;
  $('#tblRecipes> tbody> tr').find('td:eq(3)').each(function(){
    v_Total+=parseInt($(this).html());
  });

  $('#txtPack').attr('value',v_Total);
}

function menssageUser(v_menssage){
  $('#messageUser').html(v_menssage);
  $('#myMessageUser').modal('show');
}
