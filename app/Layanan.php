<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $primaryKey = 'id_layanan';
    protected $table = 'layanan';

    protected $fillable = ['nama_layanan','gambar'];
}
