<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $primaryKey='ID_SPECIE';
    protected $fillable=['NAME_SPECIE','DATE_SPECIE'];
    public  $timestamps=false;
}
