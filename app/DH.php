<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DH extends Model
{
    protected $table = 'donhang';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
