<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey='ID_PRODUCT';
    public $timestamps=false;
    protected $fillable=[
      'ID_BOX','NAME_PRODUCT','DATECREATE_PRODUCT','PRO_ID_PRODUCT'
      'IMAGE_PRODUCT','DESCRIPTION_PRODUCT','STATUS_PRODUCT','CODE_PRODUCT'
      'UPC_PRODUCT','MODIFYDATE_PRODU','ONLINENAME_PRODUCT','DATEDELETE_PRODUCT',
    ];
}
