<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    //
    protected $table='PRESENTATIONES';
    protected $primaryKey='ID_PTYPE';
    protected $fillable=['NAME_PTYPE','DATE_PTYPE'];
    public $timestamps=false;
}
