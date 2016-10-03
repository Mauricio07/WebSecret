<?php

namespace inbloom\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    //
    protected $table='PROCESSES';
    protected $primaryKey='ID_PROCESS';
    protected $fillable=['TYPE_PROCESS','DATE_PROCESS'];
    public $timestamps=false;
}
