<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $primaryKey ='ID_RECIPES';
    protected $fillable=['ID_PTYPE','NAME_RECIPES','STATUS_RECIPES','QUANTITY_RECIPES','DATECREATE_RECIPES','MODIFY_RECIPES'];
    public $timestamps=false;
}
