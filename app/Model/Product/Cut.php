<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Cut extends Model
{
    //
    protected $primaryKey='ID_CUT';
    protected $fillable=['NAME_CUT','DATE_CUT'];
    public $timestamps=false;
}
