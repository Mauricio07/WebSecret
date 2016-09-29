<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $primaryKey='id_specie';
    protected $fillable=['id_specie','name_specie','date_specie'];
    public  $timestamps=false;
}
