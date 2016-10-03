<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Items_type extends Model
{
    //
    protected $primaryKey='ID_ITYPES';
    protected $fillable=['NAME_ITYPES','DATE_ITYPES'];
    public $timestamps=false;

}
