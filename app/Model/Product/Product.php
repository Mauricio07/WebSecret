<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey='ID_PRODUCT';
    public $timestamps=false;
    protected $fillable=[
      'ID_BOX','STATUS_PRODUCT','DATEDELETE_PRODUCT',
    ];

}
