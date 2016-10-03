<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table='COLORS';
    protected $primaryKey ='ID_COLOR';
    protected $fillable=['NAME_COLOR','DATE_COLOR'];
    public $timestamps=false;
}
