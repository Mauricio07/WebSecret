<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $primaryKey='ID_GRADE';
    protected $fillable=['NAME_GRADE','DATE_GRADE'];
    public $timestamps=false;
}
