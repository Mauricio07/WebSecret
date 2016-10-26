<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Boxe_type extends Model
{
    protected $table='BOX_TYPES';
    protected $primaryKey='ID_BTYPE';
    protected $fillable=['ID_BTYPE','TYPEBOXE_BTYPE','DATECREATE_BTYPE'];
    public $timestamps=false;
}
