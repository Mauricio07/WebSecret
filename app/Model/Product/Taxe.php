<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    //
    protected $table='TAXES';
    protected $primaryKey='ID_TAX';
    protected $fillable=['COD_TAX','NAME_TAX','COST_TAX','DATE_TAX'];
    public $timestamps=false;
}
