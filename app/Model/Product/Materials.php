<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    //
    protected $table= 'MATERIALS_ITEMS';
    protected $primaryKey='ID_MATERIAL';
    protected $fillable=[
      'NAME_MATERIALS',
      'ABREB_MATERIALS',
      'TYPE_MATERIALS',
      'DATE_MATERIAL',
      'MODIFY_MATERIAL',
      'DELETE_MATERIAL',
      'STATE_MATERIAL'
    ];
    public $timestamps=false;
}
