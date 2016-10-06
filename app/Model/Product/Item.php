<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $primaryKey='ID_ITEM';
    protected $fillable=['ID_ITYPES','ID_TAX','ID_PROCESS'
    ,'ID_COLOR','ID_COST','ID_VARIATY','ID_SPECIE','ID_RECIPES'
    ,'ID_GRADE','ID_CUT','NAME_ITEM','QUANTITY_ITEM'];
    public $timestamps=false;
}
