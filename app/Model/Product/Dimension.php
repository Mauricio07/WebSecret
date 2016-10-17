<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    //
    protected $table='DIMENSIONS';
    protected $primaryKey='ID_DIMENSIONS';
    protected $fillable=['HEIGHT_DIMENSIONS','WIDTH_DIMENSIONS','DEPTH_DIMENSIONS'];
}
