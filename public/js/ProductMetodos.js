//var globals
var IdItemMaterialsProd=0;
var IdItemRecipeProd=0;
var IdMaterialsProd=0;
var indexRecipe=0;
var packRecipe=[];
var packTotal=0;

//Display materials Products

function displayMaterials(v_index){
  $.get('getHeaderProduct',{
    'v_codProducto':v_index
  },function(data){
    //console.log(data);
    $('#txtCodeProduct').attr('value','ok');
  });
}
