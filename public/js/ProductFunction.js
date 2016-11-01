
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
      //console.log(data);
      $(ajaxRecipe).html(data);
      v_contenido="<tr id=ProdMat"+IdMaterialsProd+">"+
      "<td>"+IdMaterialsProd+"</td>"+
      "<td>"+v_nameMat+"</td>"+
      "<td>"+$(v_quanty).val()+"</td>"+
      "<td><div> <a href='#' class='btn delete' id='deletingMat' onclick=deleteItem("+IdMaterialsProd+",'ProdMat"+IdMaterialsProd+"','setDeleteMaterialsProd')></a></div></td>"
      +"</tr>";
      $("#tblMaterial").append(v_contenido);
      IdMaterialsProd++; //index table of materials
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
    //console.log(data);
    //$(ajaxResponse).append('delete '+data);
    $('#'+v_IdDelTr).remove();
    //alert('Deletion successful');
    $('#myMessageUser').modal('show');

    //sumar items recetas
    var v_total=0;
    $('#tblRecipeBody tr').find('td:eq(8)').each(function(){
      console.log('>>'+parseInt($(this).html()));
      v_total+=parseInt($(this).html());
    });
    console.log('->'+v_IdDel+' - '+v_total);
    $('#tdPackRecipes'+v_indexRecipe).html(v_total); //actualiza cabecera de recetas
    //suma las recetas
    UpdateQuantityRecipe();

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
    packsItems($('#txtQuantity').val(),v_IndexRecipe);
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
  Muestra el contenido de los materiales de la receta
*/
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

function getDeleteItemsMaterials(v_indexItemMaterialDel){
  $.get('setDelItemsMaterialsRecipe',{
    'IdItemDel':v_indexItemMaterialDel
  },function(data){
    //console.log(data);
    alert(data);
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
    'IndexRecipe': indexRecipe,
    'IndexTypeRecipe':$('#txtPresentation').val(),
    'NameTypeRecipe':$('#txtPresentation').find(':selected').html(),
  },function(data){
    //console.log(data);
    $('#ajaxResponse').html(data);
    //add tabla
    v_contenido="<tr id=Recipe"+indexRecipe+">"
    +"<td>"+indexRecipe+"</td>"
    +"<td><a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseItems' aria-expanded='true' aria-controls='collapseOne' onclick=getItemsRecipe("+indexRecipe+")>"+$('#txtPresentation').find(':selected').html()+"<span class='caret'></span></a></td>"
    +"<td id=tdPackRecipes"+indexRecipe+"> 0 </td>"
    +"<td> <div class='btn-group'>"
    +"<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegister' onclick=getIndexRowRecipe("+indexRecipe+")></a>"
    +"<a data-toggle='modal' class='btn delete' onclick=deleteItem("+indexRecipe+",'Recipe"+indexRecipe+"','setDelTypeRecipe',-1)></a>"
    +"</div> </td></tr>";
    $('#tblRecipes').append(v_contenido);
    indexRecipe++;
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
        "<td> <div class='btn-group'>"
            +"<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegisterMaterialItems' onclick=getIdRowRecipe("+v_id+","+item2.INDEXITEMRECIPE+")></a>"
            +"<a data-toggle='modal' class='btn delete' onclick=deleteItem("+item2.INDEXITEMRECIPE+",'RecipeItem"+item2.INDEXITEMRECIPE+"','setDelRecipeItems',"+v_id+")></a>"
            +"</div> </td>"
            +"</tr>";
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
  $('#tblRecipes> tbody> tr').find('td:eq(2)').each(function(){
    v_Total+=parseInt($(this).html());
  });

  $('#txtPack').attr('value',v_Total);
}

/* EDICION DE PRODUCTOS*/
