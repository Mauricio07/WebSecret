//var globals
var IdItemMaterialsProd=0;
var IdItemRecipeProd=0;

var packRecipe=[];
var packTotal=0;

//display headers product
function getDataMaterials(v_indexProduct){

  $.get('getSessionMaterials',{
    'idProduct':v_indexProduct
  },function(dataMat){
    var v_contenido="";
    $.each(dataMat,function(i,items){
      v_contenido+="<tr id=ProdMat"+items.IdMaterialsProd+
      "><td>"+items.IdMaterialsProd+
      "</td><td>"+items.NomMaterialsProd+
      "</td><td>"+items.QuantMaterialsProd+"</td>+<td><div class='btn-group'>"+
      "<a href='#' class='btn delete' id='deletingMat' onclick=deleteItem("+items.IdMaterialsProd+",'ProdMat"+items.IdMaterialsProd+"','setDeleteMaterialsProd')></a></div></td>" ;
      //IdMaterialsProd++;
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
      v_contenido+="<tr id=Recipe"+items.IndexTypeRecipe+">"+
      "<td>"+items.IndexTypeRecipe+"</td>"+
      "<td><a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseItems' aria-expanded='true' aria-controls='collapseOne' onclick=getDataItemRecipe("+v_indexProduct+","+items.IndexTypeRecipe+")>"+items.NameTypeRecipe+"<span class='caret'></span></a></td>"+
      "<td id=tdPackRecipes"+items.IndexTypeRecipe+"> "+parseInt(items.QuantMaterialsProd)+" </td>"+
      "<td> <div class='btn-group'>"+
      "<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegister' onclick=getIndexRowRecipe("+items.IndexTypeRecipe+")></a>"+
      "<a data-toggle='modal' class='btn delete' onclick=deleteItem("+items.IndexTypeRecipe+",'Recipe"+items.IndexTypeRecipe+"','setDelTypeRecipe')></a></div> </td></tr>";
    });

    $('#tblRecipesBody').html(v_contenido);
  });
}
  //display items recipe
  function getDataItemRecipe(v_indexProduct, v_indexRecipe){
    $.get('getSessionItemRecipe',{
      'idRecipe':v_indexRecipe
    },function(datos_){
      $.get('getItemsRecipes',{
        'idProduct':v_indexProduct,
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
            "<td> <div class='btn-group'>"+
                "<a href='#' data-toggle='modal' class='btn edit' data-target='#myRegisterMaterialItems' onclick=getIdRowRecipe("+v_indexRecipe+","+item2.INDEXITEMRECIPE+")></a>"+
                "<a data-toggle='modal' class='btn delete' onclick=deleteItem("+item2.INDEXITEMRECIPE+",'RecipeItem"+item2.INDEXITEMRECIPE+"','setDelRecipeItems',"+v_indexRecipe+")></a></div> </td></tr>";
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
        v_contenido+="<tr id=RecipeItemMat"+item.IdItemRecipe+
        "><td>"+item.NomItemMaterialsRecipe+"</td>"+
        "<td>"+item.QuantItemMaterialsRecipe+"</td><td>"+
        "<button type='button' data-dismiss='modal' arial-lavel='Close' class='btn delete' onclick=getDeleteItemsMaterials("+item.IdItemMatProd+")></button></td></tr>";
      });
      $('#tblItemsRecipesBody').html(v_contenido);
    });
  }

  function loadImage(){
    if ($('#archivo').val().length) {
      var pathImg=URL.createObjectURL(event.target.files[0]);
      $('#imgLoad').fadeIn('slow').attr('src',pathImg);
    }
  }
