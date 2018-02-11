<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kartupelajar extends Model
{
    protected $table = 'kartupelajars';
    protected $fillable = ['nis','nama'];
    public $timestamps = true;
}
