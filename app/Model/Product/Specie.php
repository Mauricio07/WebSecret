<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $primaryKey='ID_SPECIE';
    protected $fillable=['name_specie','date_specie'];
    public  $timestamps=false;
}
