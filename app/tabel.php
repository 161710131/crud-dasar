<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabel extends Model
{
    protected $table = 'tabels';
    protected $fillable = ['nomor_ktp','nama'];
    public $timestamps = true;
}
