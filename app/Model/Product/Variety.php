<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    //
    protected $table='VARIETIES';
    protected $primaryKey='ID_VARIETY';
    protected $fillable=['NAME_VARIETY','DATE_VARIETY'];
    public $timestamps=false;
}
