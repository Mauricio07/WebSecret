//var globals
var IdItemMaterialsProd=0;
var IdItemRecipeProd=0;
var IdMaterialsProd=0;
var indexRecipe=0;
var packRecipe=[];
var packTotal=0;

//display headers product
function datosHeaders(v_index){
  $.get('getHeaderProduct',{
    'indexProduct':v_index
  },function(resp){
    console.log('ok');
  });
}
