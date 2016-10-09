<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $primaryKey='ID_ITEM';
    protected $fillable=['ID_ITYPES','ID_PROCESS','ID_COLOR','ID_SPECIE','ID_GRADE','ID_CUT','STATE_ITEM','DELETE_ITEM'];
    public $timestamps=false;
}
