<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giay extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
