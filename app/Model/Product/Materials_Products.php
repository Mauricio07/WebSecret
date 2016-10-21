<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Materials_Products extends Model
{
    protected $table="MATERIALS_PRODUCTS";
    public $fillable=['ID_PRODUCT','ID_MATERIAL','QUANTITY_PRODMAT','ID_DIMENSION'];
}
