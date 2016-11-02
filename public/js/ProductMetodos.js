//var globals
var IdItemMaterialsProd=0;
var IdItemRecipeProd=0;
var IdMaterialsProd=0;
var indexRecipe=0;
var packRecipe=[];
var packTotal=0;

//display headers product
function getDataMaterils(v_indexProduct){
IdMaterialsProd=0;
  $.get('getSessionMaterials',{
    'idProduct':v_indexProduct
  },function(resp){
    var v_contenido="";
    $.each(resp,function(i,items){
      v_contenido+="<tr id=ProdMat"+IdMaterialsProd+">"
      +"<td>"+IdMaterialsProd+"</td>"
      +"<td>"+items.NomItemMaterialsProd+"</td>"
      +"<td>"+items.QuantItemMaterialsProd+"</td>"
      +"<td><div class='btn-group'> "
      +"<a href='#' class='btn delete' id='deletingMat' onclick=deleteItem("+IdMaterialsProd+",'ProdMat"+IdMaterialsProd+"','setDeleteMaterialsProd')></a>"
      +"</div></td>"
      IdMaterialsProd++;
    });
    $('#tblMaterial').html(v_contenido);
  });
}

//display Recipes
function getDataRecipes(v_indexProduct){
  indexRecipe=0;
  $.get('getSessionRecipes',{
    'idProduct':v_indexProduct
  },function(valores){
    var v_contenido="";
    $.each(valores,function(j, items){
      indexRecipe=parseInt(items.IndexRecipe);
      v_contenido+="<tr id="+indexRecipe+">"
      +"<td>"+indexRecipe+"</td>"
      +"<td><a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseItems' aria-expanded='true' aria-controls='collapseOne' onclick=getDataItemRecipe("+indexRecipe+")>"+items.NameTypeRecipe+"<span class='caret'></span></a></td>"
      +"<td id=tdPackRecipes"+indexRecipe+"> 0 </td>"
      +"<td> <div class='btn-group'>"
      +"<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegister' onclick=getIndexRowRecipe("+indexRecipe+")></a>"
      +"<a data-toggle='modal' class='btn delete' onclick=deleteItem("+indexRecipe+",'Recipe"+indexRecipe+"','setDelTypeRecipe',-1)></a>"
      +"</div> </td></tr>";
    });
    indexRecipe++;
    $('#tblRecipesBody').html(v_contenido);
  });
}
  //display items recipe
  function getDataItemRecipe(v_indexRecipe){
    $.get('getSessionItemRecipe',{
      'idRecipe':v_indexRecipe
    },function(datos_){
      $.get('getItemsRecipes',{
        'idBusca':v_indexRecipe
      },function(data2){
        var v_contenido;
        $.each(data2,function(i,item){
          $.each(item, function(j,item2){
            v_contenido+="<tr id=RecipeItem"+item2.INDEXITEMRECIPE+">"+
            "<td><a href='#' data-toggle='modal' data-target='#myRegisterMaterialRecipe' onclick=getDataItemsMaterials("+v_indexRecipe+","+item2.INDEXITEMRECIPE+")>+</a></td>"+
            "<td>"+item2.SPECIE+"</td>"+
            "<td>"+item2.TYPE+"</td>"+
            "<td>"+item2.PROCESS+"</td>"+
            "<td>"+item2.VARIETY+"</td>"+
            "<td>"+item2.COLOR+"</td>"+
            "<td>"+item2.GRADE+"</td>"+
            "<td>"+item2.CUTS+"</td>"+
            "<td>"+item2.QUANTITY+"</td>"+
            "<td> <div class='btn-group'>"
                +"<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegisterMaterialItems' onclick=getIdRowRecipe("+v_indexRecipe+","+item2.INDEXITEMRECIPE+")></a>"
                +"<a data-toggle='modal' class='btn delete' onclick=deleteItem("+item2.INDEXITEMRECIPE+",'RecipeItem"+item2.INDEXITEMRECIPE+"','setDelRecipeItems',"+v_indexRecipe+")></a>"
                +"</div> </td>"
                +"</tr>";
          });
        });
        $('#tblRecipeBody').html(v_contenido);
      });
    });
  }

  //display materials recipes
  function getDataItemsMaterials(v_indexRecipe, v_indexItem){
    $.get('getSessionItemsMaterials',{
      'indexRecipe':v_indexRecipe,
      'indexItem':v_indexItem,
    },function(dataItemMaterials){
      var v_contenido="";
      $.each(dataItemMaterials, function(i, item) {
        v_contenido+="<tr id=RecipeItemMat"+item.IdItemRecipe+"><td>"
        +item.NomItemMaterialsRecipe+"</td><td>"
        +item.QuantItemMaterialsRecipe+"</td><td>"
        +"<button type='button' data-dismiss='modal' arial-lavel='Close' class='btn delete' onclick=getDeleteItemsMaterials("+item.IdItemMatProd+")></button></td></tr>";
      });
      $('#tblItemsRecipesBody').html(v_contenido);
    });
  }
